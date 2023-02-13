<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Versione estesa
    Schema::table('posts', function (Blueprint $table) {
      $table->bigInteger('person_id')->unsigned();
      $table->foreign('person_id')->references('id')->on('people');
    });

    // Versione contratta
    Schema::table('person_details', function (Blueprint $table) {
      $table->foreignId('person_id')->constrained();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->dropForeign('posts_person_id_foreign');
      $table->dropColumn('person_id');
    });

    Schema::table('person_details', function (Blueprint $table) {
      $table->dropForeign('person_details_person_id_foreign');
      $table->dropColumn('person_id');
    });
  }
};