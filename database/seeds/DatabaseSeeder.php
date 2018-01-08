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

        \DB::table('purchases_states')->insert([
            ['value' => 'Pendiente'],
            ['value' => 'Enviada'],
            ['value' => 'Recibida']
        ]);

        \DB::table('sizes')->insert([
            ['value' => 'XS'],
            ['value' => 'S'],
            ['value' => 'M'],
            ['value' => 'L'],
            ['value' => 'XL'],
            ['value' => 'Unico']
        ]);

        \DB::table('colors')->insert([
            ['value' => 'Negro'],
            ['value' => 'Blanco'],
            ['value' => 'Gris'],
            ['value' => 'Verde'],
            ['value' => 'Rojo'],
            ['value' => 'Azul']
        ]);

        factory(App\Client::class, 3)->create()->each(function ($client) {
            $client->purchases()->saveMany(factory(App\Purchase::class,2)->make());
        });

        \App\Purchase::all()->each(function ($purchase) {
            $times = rand(1, 3);
            for ($i=0; $i<$times; $i++) {
                $product =  \App\Product::find(rand(1,9));
                $item = new \App\Item;
                $item->name = $product->name;
                $item->price = rand(100,500);
                $item->cost = rand(100,500);
                $item->amount = rand(1,3);
                $item->purchase_id = $purchase->id;
                $item->product_id = $purchase->id;
                $item->save();
            }
        });

        \DB::table('users')->insert([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASS'))
        ]);


	   \DB::table('stock')->insert([
            ['product_id' => 1, 'size_id' => 1, 'color_id' => 1, 'amount' => 5],
            ['product_id' => 1, 'size_id' => 2, 'color_id' => 3, 'amount' => 5],
            ['product_id' => 1, 'size_id' => 3, 'color_id' => 5, 'amount' => 5],
            ['product_id' => 2, 'size_id' => 4, 'color_id' => 2, 'amount' => 5],
            ['product_id' => 2, 'size_id' => 5, 'color_id' => 4, 'amount' => 5],
            ['product_id' => 2, 'size_id' => 1, 'color_id' => 6, 'amount' => 5],
            ['product_id' => 3, 'size_id' => 2, 'color_id' => 1, 'amount' => 5],
            ['product_id' => 3, 'size_id' => 3, 'color_id' => 1, 'amount' => 5],
            ['product_id' => 3, 'size_id' => 4, 'color_id' => 2, 'amount' => 5],
            ['product_id' => 4, 'size_id' => 5, 'color_id' => 2, 'amount' => 5],
            ['product_id' => 4, 'size_id' => 1, 'color_id' => 3, 'amount' => 5],
            ['product_id' => 4, 'size_id' => 2, 'color_id' => 3, 'amount' => 5],
            ['product_id' => 5, 'size_id' => 3, 'color_id' => 4, 'amount' => 5],
            ['product_id' => 5, 'size_id' => 4, 'color_id' => 4, 'amount' => 5],
            ['product_id' => 5, 'size_id' => 5, 'color_id' => 5, 'amount' => 5],
            ['product_id' => 6, 'size_id' => 1, 'color_id' => 5, 'amount' => 5],
            ['product_id' => 6, 'size_id' => 2, 'color_id' => 6, 'amount' => 5],
            ['product_id' => 6, 'size_id' => 3, 'color_id' => 6, 'amount' => 5]
        ]);
	}
}
