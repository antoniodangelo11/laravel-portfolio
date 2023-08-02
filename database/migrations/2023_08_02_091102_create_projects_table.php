<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('title', 50);
            $table->string('slug', 50)->unique();
            $table->date('creation_date');
            $table->date('last_update');
            $table->string('collaborators', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 200)->nullable();
            $table->string('link_github', 150);
            // creo la colonna della chiave esterna

            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('user_id');
            // definire la colonna come chiave esterna

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // elimino la chiave esterna

            $table->dropForeign('projects_type_id_foreign');
            $table->dropForeign('projects_user_id_foreign');

            // elimino la colonna

            $table->dropColumn('type_id');
            $table->dropColumn('user_id');
        });
    }
};
