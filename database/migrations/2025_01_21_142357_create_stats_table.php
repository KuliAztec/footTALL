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
            $table->integer('mins');
            $table->integer('apps');
            $table->integer('sub');
            $table->integer('gls');
            $table->integer('ast');
            $table->float('av_rat');
            $table->integer('gwin');
            $table->float('tgls_per_90');
            $table->float('tcon_per_90');
            $table->float('np_xg_per_90');
            $table->float('sht_per_90');
            $table->float('shots_outside_box_per_90');
            $table->float('gls_per_90');
            $table->float('xg');
            $table->float('np_xg');
            $table->float('xg_op');
            $table->integer('shots');
            $table->integer('pens');
            $table->float('xg_per_shot');
            $table->float('conv_perc');
            $table->float('op_kp_per_90');
            $table->float('ch_c_per_90');
            $table->float('pr_passes_per_90');
            $table->float('xa_per_90');
            $table->float('ps_c_per_90');
            $table->float('pas_perc');
            $table->float('op_crs_c_per_90');
            $table->float('sprints_per_90');
            $table->integer('fa');
            $table->float('drb_per_90');
            $table->float('tck_per_90');
            $table->float('tck_r');
            $table->float('hdrs_w_per_90');
            $table->float('hdr_perc');
            $table->float('blk_per_90');
            $table->float('clr_per_90');
            $table->float('int_per_90');
            $table->float('poss_won_per_90');
            $table->float('pres_c_per_90');
            $table->float('poss_lost_per_90');
            $table->integer('yel');
            $table->integer('red');
            $table->float('gl_mst');
            $table->float('xgp_per_90');
            $table->float('sv_perc');
            $table->float('con_per_90');
            $table->float('cln_per_90');
            $table->bigInteger('wage'); // Change wage column type to bigInteger
            $table->timestamps();
        });

        // Set the character set and collation for the table
        Schema::table('stats', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
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
