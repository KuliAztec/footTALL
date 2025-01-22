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
            DB::table('stats')->insert([
                'id' => $record['No.'],
                'name' => $record['Name'],
                'nat' => $record['Nat'],
                'age' => $record['Age'],
                'position' => $record['Position'],
                'apps' => $record['Apps'],
                'sub' => $record['Sub'],
                'gls' => $record['Gls'],
                'ast' => $record['Ast'],
                'pom' => $record['PoM'],
                'av_rat' => $record['Av Rat'],
                'mins' => $record['Mins'],
                'np_xg_per_90' => $record['NP-xG/90'],
                'conv_perc' => $record['Conv %'],
                'shots' => $record['Shots'],
                'xg_per_shot' => $record['xG/shot'],
                'sht_per_90' => $record['ShT/90'],
                'gls_per_90' => $record['Gls/90'],
                'xg_op' => $record['xG-OP'],
                'op_kp_per_90' => $record['OP-KP/90'],
                'ch_c_per_90' => $record['Ch C/90'],
                'pr_passes_per_90' => $record['Pr passes/90'],
                'xa_per_90' => $record['xA/90'],
                'op_crs_c_per_90' => $record['OP-Crs C/90'],
                'pas_perc' => $record['Pas %'],
                'tgls_per_90' => $record['Tgls/90'],
                'drb_per_90' => $record['Drb/90'],
                'hdr_perc' => $record['Hdr %'],
                'int_per_90' => $record['Int/90'],
                'blk_per_90' => $record['Blk/90'],
                'tcon_per_90' => $record['Tcon/90'],
                'pres_c_per_90' => $record['Pres C/90'],
                'gl_mst' => $record['Gl Mst'],
            ]);
        }
    }
}
