<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;
use App\Models\User;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Product::getTableName(), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('slug')->unique();
            $table->unsignedInteger('creator_id');
            $table->unsignedInteger('moderator_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on(User::getTableName())
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('moderator_id')->references('id')->on(User::getTableName())
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
        Schema::dropIfExists(Product::getTableName());
    }
}
