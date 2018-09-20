<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Seller;

class CreateOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Offer::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('seller_id');
            $table->float('price')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on(Product::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('seller_id')->references('id')->on(Seller::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['product_id', 'seller_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Offer::getTableName());
    }
}
