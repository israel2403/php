<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookItemPesonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_item_person', function (Blueprint $table) {
            $table->primary(['person_id', 'book_item_id']);
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('book_item_id')->unsigned();
            $table->date("checkout");
            $table->date("return");
            $table->date("really_return");
            $table->foreign('person_id')
                ->references('id')
                ->on('persons');
            $table->foreign('book_item_id')
                ->references('id')
                ->on('book_item');
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
        Schema::dropIfExists('book_item_person');
    }
}
