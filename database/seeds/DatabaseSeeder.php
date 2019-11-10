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

        factory(App\Category::class, 30)->create();
        factory(App\Brand::class, 30)->create();
        factory(App\Supplier::class, 50)->create();
        factory(App\Product::class, 200)->create();
        factory(App\Customer::class, 100)->create();
        factory(App\Review::class, 300)->create();
        factory(App\Subscriber::class, 100)->create();
        
    }
}
