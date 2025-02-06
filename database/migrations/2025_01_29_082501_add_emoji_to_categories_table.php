<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmojiToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Ajout de la colonne emoji à la table categories
        Schema::table('categories', function (Blueprint $table) {
            $table->string('emoji', 10)->nullable()->after('name');  // Champ emoji de type string
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Suppression de la colonne emoji si la migration est annulée
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('emoji');
        });
    }
}
