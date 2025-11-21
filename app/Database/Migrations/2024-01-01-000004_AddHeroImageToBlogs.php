<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHeroImageToBlogs extends Migration
{
    public function up()
    {
        $fields = [
            'hero_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'after'      => 'slug',
            ],
        ];
        $this->forge->addColumn('blogs', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('blogs', 'hero_image');
    }
}
