<?php

use Illuminate\Database\Seeder;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->insert([
            'email'         => 'master@codelovers.vn',
            'password'      => bcrypt('cls@2019'),
            'username'      => 'master',
            'name'          => 'Master',
            'role'          => ROLE_MANAGER_MASTER,
            'status'        => ADMIN_STATUS_ACTIVE,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);

        DB::table('managers')->insert([
            'email'         => 'admin@codelovers.vn',
            'password'      => bcrypt('cls@2019'),
            'username'      => 'admin',
            'name'          => 'Administrator',
            'role'          => ROLE_MANAGER_ADMIN,
            'status'        => ADMIN_STATUS_ACTIVE,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ]);
    }
}
