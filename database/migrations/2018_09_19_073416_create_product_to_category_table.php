<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;
use App\Models\Category;

class CreateProductToCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_to_category', function (Blueprint $table) {
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on(Product::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on(Category::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['product_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_to_category');
    }
}
