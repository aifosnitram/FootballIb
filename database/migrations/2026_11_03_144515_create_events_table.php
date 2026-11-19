<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date('dayOfMatch');
            $table->time('matchHour');
            $table->integer(('totalScore'));
            $table->integer('countScore');
            $table->foreignId('local_team_id')->constrained('teams')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('visitor_team_id')->constrained('teams')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('local_team_goals');
            $table->integer('visitor_team_goals'); 
            $table->foreignId('matchday_id')->constrained()->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
