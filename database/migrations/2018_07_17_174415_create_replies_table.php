<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('replies', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('conversation_id');
      $table->integer('sender');
      $table->integer('receiver');
      $table->text('content');
      $table->boolean('seen');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('replies');
  }
}
