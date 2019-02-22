<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //フォローする人
            $table->integer('follow_id')->unsigned(); //フォローされる人

            $table->timestamps();
        });
        Schema::table('follows', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //user_idはusersのidだよ、もしuserのidを消したらフォローのデータも自動的に消してね(foreignは外部キー)

            $table->foreign('follow_id')->references('id')->on('users')->onDelete('cascade');
        });

        
    }

    


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
