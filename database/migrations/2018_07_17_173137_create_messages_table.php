<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('messages', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sender');
      $table->integer('receiver');
      $table->string('title');
      $table->text('content');
      $table->boolean('read');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('messages');
  }
}
