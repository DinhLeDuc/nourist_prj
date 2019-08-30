<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $groups = [
            [
                'group_id' => '1',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('nourist2019'),
                'status' => USER_STATUS_ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'group_id' => '2',
                'username' => 'Hosts',
                'email' => 'hosts@gmail.com',
                'password' => bcrypt('nourist2019'),
                'status' => USER_STATUS_ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'group_id' => '3',
                'username' => 'guests',
                'email' => 'guests@gmail.com',
                'password' => bcrypt('nourist2019'),
                'status' => USER_STATUS_ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        DB::table('users')->insert($groups);
    }
}
