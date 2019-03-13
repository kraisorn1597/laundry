<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('roles')->insert([
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Editor',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name' => 'Employee',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_admins')->insert([
            'role_id' => '1',
            'admin_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('role_admins')->insert([
            'role_id' => '2',
            'admin_id' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
