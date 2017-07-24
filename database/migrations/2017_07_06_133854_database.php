<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //PRODUCTS <<relación>> tiene una relación polimórfica de uno a muchos con images
        Schema::create('products', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('code',50)->unique(); //código interno de indentificación que tiene el cliente.
            $table->float('price',8,2)->unsigned()->nullable();
            $table->float('cost',8,2)->unsigned();
            $table->smallInteger('profit_margin')->unsigned()->nullable();
            //$table->smallInteger('stock'); El stock es la cantidad de un producto en relación a un talle
            $table->smallInteger('category_id')->unsigned()->index(); //<<relación>> con category
            $table->smallInteger('subcategory_id')->nullable()->unsigned()->index(); //<<relación>> con category
            $table->boolean('visible')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        //STOCK
        Schema::create('stock', function (Blueprint $table) {
            $table->smallInteger('product_id')->unsigned();
            $table->tinyInteger('size_id')->unsigned();

            //índices
            $table->primary(['product_id', 'size_id']);
        });

        //SIZES (talles)
        Schema::create('sizes', function (Blueprint $table) {
            $table->tinyInteger('id')->unsigned()->autoIncrement();
            $table->string('value',30);
        });

        //PURCHASES
        Schema::create('purchases', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->float('total',8.,2)->unsigned();
            $table->float('cost',8,2)->unsigned();
            $table->boolean('paid')->default(0);
            $table->smallInteger('client_id')->unsigned()->index(); //<<relación>> con clients
            $table->smallInteger('state_id')->unsigned()->index(); //<<relación>> con purchases_states
            $table->timestamps();
        });

        //PURCHASES STATES (estados que puede tener un pedido: pedida, enviada, recibida, etc)
        Schema::create('purchases_states', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('value', 50);
        });

        //ITEMS (productos en una compra)
        Schema::create('items', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name'); //nombre del producto (guarda el histórico)
            $table->float('price',8.,2)->unsigned(); //por unidad
            $table->float('cost',8,2)->unsigned(); //por unidad
            $table->smallInteger('amount')->unsigned();
            $table->smallInteger('product_id')->unsigned()->index(); //<<relación>> con products
            $table->mediumInteger('purchase_id')->unsigned()->index(); //<<relación>> con purchase
        });

        //CATEGORIES
        Schema::create('categories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });

        //SUBCATEGORIES
        Schema::create('subcategories', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
            $table->smallInteger('category_id')->nullable()->unsigned()->index(); //<<relación>> con categories
        });

        //CLIENTS
        Schema::create('clients', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
            $table->string('email',127);
            $table->string('street',127);
            $table->string('number',10);
            $table->string('floor',20);
            $table->string('apartment',20);
            $table->string('zip_code',20);
            $table->smallInteger('localidad_id')->unsigned()->index(); //<<relación>> con localidades
            $table->smallInteger('provincia_id')->unsigned()->index(); //<<relación>> con provincias
            $table->softDeletes();
            $table->timestamps();
        });

        //IMAGES
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('src');
            $table->integer('imageable_id')->nullable()->unsigned();
            $table->string('imageable_type', 80)->nullable();
            $table->tinyInteger('is_video')->default(0)->unsigned();
            $table->boolean('pending')->default(1);
            $table->smallInteger('order')->default(0)->unsigned();
            $table->timestamps();

            //indices
            $table->index(['imageable_id', 'imageable_type']);
            $table->index('order');
        });

        //IMAGES INFO
        Schema::create('images_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('value', 50);

            $table->integer('image_id')->unsigned()->index();
        });

        //SLIDES <<relación>> tiene una relación polimórfica de uno a muchos con images
        Schema::create('slides', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name',127);
        });

        //RELATED PRODUCTS (no convertir en modelo)
        Schema::create('related_products', function (Blueprint $table) {
            $table->smallInteger('product1')->unsigned();
            $table->smallInteger('product2')->unsigned();
            $table->smallInteger('times')->unsigned();

            //índices
            $table->primary(['product1', 'product2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('stock');
        Schema::dropIfExists('sizes');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('purchases_states');
        Schema::dropIfExists('items');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('images');
        Schema::dropIfExists('images_info');
        Schema::dropIfExists('slides');
        Schema::dropIfExists('related_products');
    }
}
