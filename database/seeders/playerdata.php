<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class playerdata extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv = Reader::createFromPath(storage_path('app/private/Dataset.csv'), 'r');
        $csv->setHeaderOffset(0);

        $records = $csv->getRecords();
        foreach ($records as $record) {
            // Check if the record already exists
            $exists = DB::table('stats')->where('id', $record['No.'])->exists();
            if ($exists) {
                continue; // Skip duplicate entry
            }

            DB::table('stats')->insert([
                'id' => $record['No.'],
                'name' => $record['Name'],
                'nat' => $record['Nat'],
                'age' => $record['Age'],
                'position' => $record['Position'],
                'mins' => str_replace(',', '', $record['Mins']), // Remove commas from mins
                'apps' => $record['Apps'],
                'sub' => $record['Sub'],
                'gls' => $record['Gls'],
                'ast' => $record['Ast'],
                'av_rat' => $record['Av Rat'],
                'gwin' => $record['Gwin'],
                'tgls_per_90' => $record['Tgls/90'],
                'tcon_per_90' => $record['Tcon/90'],
                'np_xg_per_90' => $record['NP-xG/90'],
                'sht_per_90' => $record['ShT/90'],
                'shots_outside_box_per_90' => $record['Shots Outside Box/90'],
                'gls_per_90' => $record['Gls/90'],
                'xg' => $record['xG'],
                'np_xg' => $record['NP-xG'],
                'xg_op' => $record['xG-OP'],
                'shots' => $record['Shots'],
                'pens' => $record['Pens'],
                'xg_per_shot' => $record['xG/shot'],
                'conv_perc' => $record['Conv %'],
                'op_kp_per_90' => $record['OP-KP/90'],
                'ch_c_per_90' => $record['Ch C/90'],
                'pr_passes_per_90' => $record['Pr passes/90'],
                'xa_per_90' => $record['xA/90'],
                'ps_c_per_90' => $record['Ps C/90'],
                'pas_perc' => $record['Pas %'],
                'op_crs_c_per_90' => $record['OP-Crs C/90'],
                'sprints_per_90' => $record['Sprints/90'],
                'fa' => $record['FA'],
                'drb_per_90' => $record['Drb/90'],
                'tck_per_90' => $record['Tck/90'],
                'tck_r' => $record['Tck R'],
                'hdrs_w_per_90' => $record['Hdrs W/90'],
                'hdr_perc' => $record['Hdr %'],
                'blk_per_90' => $record['Blk/90'],
                'clr_per_90' => $record['Clr/90'],
                'int_per_90' => $record['Int/90'],
                'poss_won_per_90' => $record['Poss Won/90'],
                'pres_c_per_90' => $record['Pres C/90'],
                'poss_lost_per_90' => $record['Poss Lost/90'],
                'yel' => $record['Yel'],
                'red' => $record['Red'],
                'gl_mst' => $record['Gl Mst'],
                'xgp_per_90' => $record['xGP/90'],
                'sv_perc' => $record['Sv %'],
                'con_per_90' => $record['Con/90'],
                'cln_per_90' => $record['Cln/90'],
                'wage' => str_replace(',', '', $record['Wage']), // Remove commas from wage
            ]);
        }
    }
}
