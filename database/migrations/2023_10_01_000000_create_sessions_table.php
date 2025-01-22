<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('sessions')) {
            Schema::create('sessions', function (Blueprint $table) {
                $table->id();
                $table->string('session_id')->unique();
                $table->text('data');
                $table->timestamp('last_activity');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}