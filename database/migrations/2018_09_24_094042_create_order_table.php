<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Order;
use App\Models\Offer;
Use App\Models\Customer;

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
            $table->unsignedInteger('offer_id');
            $table->unsignedInteger('customer_id');
            $table->timestamps();

            $table->foreign('offer_id')->references('id')->on(Offer::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('customer_id')->references('id')->on(Customer::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            /* @todo include in prod
            $table->unique(['offer_id', 'customer_id']);
            */
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
