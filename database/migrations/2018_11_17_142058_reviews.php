<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $stars = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        Schema::create('reviews', function (Blueprint $table) use ($stars) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('book_id')->index();
            $table->enum('stars', $stars)->default(0);
            $table->text('comment');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
