<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ConvertAuthorIdToAuthorName extends Migration
{
    public function up()
    {
        // First, copy existing author data (username) to a temporary column
        $this->db->query("
            ALTER TABLE blogs 
            ADD COLUMN author_name VARCHAR(255) NULL AFTER author_id
        ");

        // Migrate existing data - copy usernames from users table
        $this->db->query("
            UPDATE blogs 
            INNER JOIN users ON blogs.author_id = users.id 
            SET blogs.author_name = users.username
        ");

        // Drop the foreign key constraint
        $this->db->query("
            ALTER TABLE blogs 
            DROP FOREIGN KEY blogs_author_id_foreign
        ");

        // Drop the old author_id column
        $this->db->query("
            ALTER TABLE blogs 
            DROP COLUMN author_id
        ");
    }

    public function down()
    {
        // Add back author_id column
        $this->db->query("
            ALTER TABLE blogs 
            ADD COLUMN author_id INT UNSIGNED NULL AFTER id
        ");

        // Try to map author names back to user IDs (best effort)
        $this->db->query("
            UPDATE blogs 
            INNER JOIN users ON blogs.author_name = users.username 
            SET blogs.author_id = users.id
        ");

        // Re-add the foreign key constraint
        $this->db->query("
            ALTER TABLE blogs 
            ADD CONSTRAINT blogs_author_id_foreign 
            FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
        ");

        // Drop the author_name column
        $this->db->query("
            ALTER TABLE blogs 
            DROP COLUMN author_name
        ");
    }
}
