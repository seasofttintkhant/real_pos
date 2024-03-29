<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string("name")->nullable();
            $table->integer("deposite")->default(0);
            $table->integer("price")->default(0);
            $table->string("code")->nullable();
            $table->text("description")->nullable();
            $table->integer("added_by");
            $table->integer("category_id");
            $table->integer("quantity")->default(1);
            $table->softDeletes();      
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
