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
                $table->text('payload')->nullable(); // Allow null values
                $table->unsignedBigInteger('user_id')->nullable(); // Added column
                $table->string('ip_address', 45)->nullable(); // Added column
                $table->text('user_agent')->nullable(); // Added column
                $table->timestamp('last_activity')->nullable()->useCurrent(); // Use timestamp instead
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}