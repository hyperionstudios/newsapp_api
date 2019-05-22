<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string( 'title' );
            $table->text( 'content' );

            $table->dateTime( 'date_written' );

            $table->string( 'featured_image' )->nullable();
            $table->integer( 'votes_up' )->nullable();
            $table->integer( 'votes_down' )->nullable();
            $table->text( 'voters_up' )->nullable();
            $table->text( 'voters_down' )->nullable();

            // Relationships
            $table->integer( 'user_id' );
            $table->integer( 'category_id' );

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
        Schema::dropIfExists('posts');
    }
}
