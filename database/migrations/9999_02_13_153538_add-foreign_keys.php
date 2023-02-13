<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
           
            $table -> bigInteger('user_id') -> unsigned();

            // Scrittura estesa per creare relazioni tra le tabelle
            $table -> foreign('User_id')
                -> references('id')
                -> on('users');

            // Scrittura contratta

            // $table -> foreignId('user_id')-> constrained();

            Schema::table('person_details', function (Blueprint $table) {
                // Versione 2
                $table->foreignId('person_id')->constrained();
              });
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

