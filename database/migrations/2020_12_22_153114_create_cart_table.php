<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('productid');
            $table->foreign('productid')
                            ->references('id')
                            ->on('Product')
                            ->onDelete('cascade');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')
                            ->references('id')
                            ->on('Users')
                            ->onDelete('cascade');
            $table->integer('qty');
            $table->integer('subtotal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
