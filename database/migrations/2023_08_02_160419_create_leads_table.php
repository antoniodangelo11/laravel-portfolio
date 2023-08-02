<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('name', 50);
            $table->string('email', 250);
            $table->boolean('newsletter');
            $table->text('message');
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
