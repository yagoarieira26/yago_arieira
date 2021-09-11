<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeams extends Migration
{

    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('state');
            $table->foreignId('division_id')->constrained('divisions');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
