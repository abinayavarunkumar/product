<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('product_name');
			$table->bigInteger('unit_type_id');
			$table->string('product_category');
			$table->json('product_images');
            $table->decimal('product_price', 10, 2);
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->date('discount_start_date')->nullable();
            $table->date('discount_end_date')->nullable();
            $table->decimal('tax_percentage', 5, 2)->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->enum('stock_entry', ['instock', 'outofstock'])->default('instock');
            $table->integer('stock_quantity')->default(0);
            $table->timestamps();

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
    }
}
