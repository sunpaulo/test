<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Customer;
use App\Models\Product;
use App\Enums\AuctionStatus;

class CreateAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('product_id');
            $table->enum('status', AuctionStatus::values())->default(AuctionStatus::IN_PROGRESS);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')->references('id')->on(Customer::getTableName())
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('product_id')->references('id')->on(Product::getTableName())
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction');
    }
}
