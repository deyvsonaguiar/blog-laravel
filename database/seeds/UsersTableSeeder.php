<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Administrador',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Autor',
            'username' => 'autor',
            'email' => 'autor@autor.com',
            'password' => bcrypt('password'),
        ]);
    }
}
