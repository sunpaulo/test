<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Product;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Order::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('customer_id');
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on(Product::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('seller_id')->references('id')->on(Seller::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on(Customer::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Order::getTableName());
    }
}
