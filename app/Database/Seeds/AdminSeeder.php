<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Seed Roles
        $data = [
            [
                'name' => 'admin',
                'permissions' => json_encode(['all']),
            ],
            [
                'name' => 'user',
                'permissions' => json_encode(['read']),
            ],
        ];

        // Using Query Builder
        $this->db->table('roles')->insertBatch($data);

        // Seed Admin User
        // Password is 'password'
        $password = password_hash('password', PASSWORD_DEFAULT);

        $data = [
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password_hash' => $password,
            'role_id'  => 1, // Admin role
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
