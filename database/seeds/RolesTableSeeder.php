<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('roles')->insert([
            'type' => 'Admin',
            'slug' => Str::slug('Admin')
        ]);

        DB::table('roles')->insert([
            'type' => 'User',
            'slug' => Str::slug('User')
        ]);
    }
}
