<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::table('projects_alessio', function (Blueprint $table) {
             // creo la colonna della chiave esterna

             $table->unsignedBigInteger('type_id');

             // definire la colonna come chiave esterna
 
             $table->foreign('type_id')->references('id')->on('types');
        });
    }

    
    public function down()
    {
        Schema::table('projects_alessio', function (Blueprint $table) {
            // elimino la chiave esterna

            $table->dropForeign('projects_type_id_foreign');

            // elimino la colonna

            $table->dropColumn('type_id');
        });
    }
};
