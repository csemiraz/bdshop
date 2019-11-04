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
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        factory(App\Category::class, 20)->create();
        factory(App\Brand::class, 25)->create();
        factory(App\Supplier::class, 15)->create();
        factory(App\Product::class, 100)->create();
    }
}
