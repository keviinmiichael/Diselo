<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Category::class, 3)->create()->each(function ($category) {
            $subcategries = factory(App\Subcategory::class, 3)->create();
            $subcategries->each(function ($subcategory) use ($category) {
                $product = factory(App\Product::class)->make();
                $product->category_id = $category->id;
                $rand = rand(0,1);
                if ($rand) $product->subcategory_id = $subcategory->id;
                $product->save();
            });
            $category->subcategories()->saveMany($subcategries);
        });

        \DB::table('users')->insert([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASS'))
        ]);
    }
}
