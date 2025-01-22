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
        Schema::create('stats', function (Blueprint $table) {
            $table->integer('id')->primary(); // Jersey number as ID
            $table->string('name');
            $table->string('nat');
            $table->integer('age');
            $table->string('position');
            $table->integer('apps');
            $table->integer('sub');
            $table->integer('gls');
            $table->integer('ast');
            $table->integer('pom');
            $table->float('av_rat');
            $table->integer('mins');
            $table->float('np_xg_per_90');
            $table->float('conv_perc');
            $table->integer('shots');
            $table->float('xg_per_shot');
            $table->float('sht_per_90');
            $table->float('gls_per_90');
            $table->float('xg_op');
            $table->float('op_kp_per_90');
            $table->float('ch_c_per_90');
            $table->float('pr_passes_per_90');
            $table->float('xa_per_90');
            $table->float('op_crs_c_per_90');
            $table->float('pas_perc');
            $table->float('tgls_per_90');
            $table->float('drb_per_90');
            $table->float('hdr_perc');
            $table->float('int_per_90');
            $table->float('blk_per_90');
            $table->float('tcon_per_90');
            $table->float('pres_c_per_90');
            $table->float('gl_mst');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
