<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dicta est laboriosam molestias nihil odio officia rem suscipit temporibus ullam. Architecto facilis magnam quasi? Aliquam at consequuntur dignissimos dolor ea error esse fugit illum impedit ipsa, laboriosam, magnam magni molestias nisi officiis perferendis possimus, provident ratione recusandae reprehenderit sed temporibus tenetur totam unde veniam. Aliquam at aut cumque dicta eius id libero nam necessitatibus quaerat quasi similique, sunt vel! Adipisci assumenda beatae blanditiis cum distinctio dolores eaque eligendi, eos eveniet expedita fugiat harum illum laborum laudantium minima necessitatibus nulla odit praesentium quia quos ratione rerum saepe similique sint velit voluptate voluptatem. Corporis dignissimos dolor eaque expedita iusto laudantium minima, minus nihil quaerat, repellendus soluta tempora temporibus, voluptatibus! Aperiam cum cupiditate dolor, ducimus eius, eveniet exercitationem ipsam itaque iure natus odit porro vel. Aliquid cum cupiditate dignissimos distinctio ea earum eos, exercitationem facere id iusto maxime mollitia natus neque nisi nostrum numquam praesentium quae quasi quibusdam quidem quo repellat repellendus rerum saepe veniam veritatis vero voluptas. Consequatur dicta porro veniam. Delectus distinctio error expedita fuga fugiat necessitatibus quam repellendus. Accusamus beatae eaque esse illum, in ipsum iste, minus molestias mollitia tempora tempore ullam vitae? Amet asperiores consequuntur delectus doloremque earum error exercitationem explicabo fuga harum in incidunt ipsum libero molestiae molestias nam nisi perferendis quam quas repudiandae tempora, temporibus tenetur ut velit voluptate voluptatibus! Aliquam animi assumenda culpa dolores doloribus eos eum facere, illo incidunt ipsa ipsam magni molestiae nemo nostrum numquam placeat quia quidem repellat rerum similique totam unde voluptatum?';

        Schema::create('books', function (Blueprint $table) use ($lorem) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->default($lorem);
            $table->date('year')->nullable();
            $table->string('image')->nullable();
            $table->integer('count')->nullable();
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
        Schema::drop('books');
    }
}
