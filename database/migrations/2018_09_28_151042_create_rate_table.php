<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Auction;
use App\Models\Seller;

class CreateRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('auction_id');
            $table->unsignedInteger('seller_id');
            $table->float('value');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('auction_id')->references('id')->on(Auction::getTableName())
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('seller_id')->references('id')->on(Seller::getTableName())
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
        Schema::dropIfExists('rate');
    }
}
