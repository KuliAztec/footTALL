<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $players = DB::table('stats')->get()->map(function ($player) {
            $player->stats = [
                'id' => $player->id,
                'name' => $player->name,
                'nat' => $player->nat,
                'age' => $player->age,
                'position' => $player->position,
                'mins' => $player->mins,
                'apps' => $player->apps,
                'sub' => $player->sub,
                'gls' => $player->gls,
                'ast' => $player->ast,
                'av_rat' => $player->av_rat,
                'gwin' => $player->gwin,
                'tgls_per_90' => $player->tgls_per_90,
                'tcon_per_90' => $player->tcon_per_90,
                'np_xg_per_90' => $player->np_xg_per_90,
                'sht_per_90' => $player->sht_per_90,
                'shots_outside_box_per_90' => $player->shots_outside_box_per_90,
                'gls_per_90' => $player->gls_per_90,
                'xg' => $player->xg,
                'np_xg' => $player->np_xg,
                'xg_op' => $player->xg_op,
                'shots' => $player->shots,
                'pens' => $player->pens,
                'xg_per_shot' => $player->xg_per_shot,
                'conv_perc' => $player->conv_perc,
                'op_kp_per_90' => $player->op_kp_per_90,
                'ch_c_per_90' => $player->ch_c_per_90,
                'pr_passes_per_90' => $player->pr_passes_per_90,
                'xa_per_90' => $player->xa_per_90,
                'ps_c_per_90' => $player->ps_c_per_90,
                'pas_perc' => $player->pas_perc,
                'op_crs_c_per_90' => $player->op_crs_c_per_90,
                'sprints_per_90' => $player->sprints_per_90,
                'fa' => $player->fa,
                'drb_per_90' => $player->drb_per_90,
                'tck_per_90' => $player->tck_per_90,
                'tck_r' => $player->tck_r,
                'hdrs_w_per_90' => $player->hdrs_w_per_90,
                'hdr_perc' => $player->hdr_perc,
                'blk_per_90' => $player->blk_per_90,
                'clr_per_90' => $player->clr_per_90,
                'int_per_90' => $player->int_per_90,
                'poss_won_per_90' => $player->poss_won_per_90,
                'pres_c_per_90' => $player->pres_c_per_90,
                'poss_lost_per_90' => $player->poss_lost_per_90,
                'yel' => $player->yel,
                'red' => $player->red,
                'gl_mst' => $player->gl_mst,
                'xgp_per_90' => $player->xgp_per_90,
                'sv_perc' => $player->sv_perc,
                'con_per_90' => $player->con_per_90,
                'cln_per_90' => $player->cln_per_90,
                'wage' => $player->wage,
            ];
            return $player;
        });
        return view('chart', ['players' => $players]);
    }

    public function getPlayerStats($playerId)
    {
        $playerStats = DB::table('stats')->where('id', $playerId)->first();

        if ($playerStats) {
            $stats = [
                'id' => $playerStats->id,
                'name' => $playerStats->name,
                'nat' => $playerStats->nat,
                'age' => $playerStats->age,
                'position' => $playerStats->position,
                'mins' => $playerStats->mins,
                'apps' => $playerStats->apps,
                'sub' => $playerStats->sub,
                'gls' => $playerStats->gls,
                'ast' => $playerStats->ast,
                'av_rat' => $playerStats->av_rat,
                'gwin' => $playerStats->gwin,
                'tgls_per_90' => $playerStats->tgls_per_90,
                'tcon_per_90' => $playerStats->tcon_per_90,
                'np_xg_per_90' => $playerStats->np_xg_per_90,
                'sht_per_90' => $playerStats->sht_per_90,
                'shots_outside_box_per_90' => $playerStats->shots_outside_box_per_90,
                'gls_per_90' => $playerStats->gls_per_90,
                'xg' => $playerStats->xg,
                'np_xg' => $playerStats->np_xg,
                'xg_op' => $playerStats->xg_op,
                'shots' => $playerStats->shots,
                'pens' => $playerStats->pens,
                'xg_per_shot' => $playerStats->xg_per_shot,
                'conv_perc' => $playerStats->conv_perc,
                'op_kp_per_90' => $playerStats->op_kp_per_90,
                'ch_c_per_90' => $playerStats->ch_c_per_90,
                'pr_passes_per_90' => $playerStats->pr_passes_per_90,
                'xa_per_90' => $playerStats->xa_per_90,
                'ps_c_per_90' => $playerStats->ps_c_per_90,
                'pas_perc' => $playerStats->pas_perc,
                'op_crs_c_per_90' => $playerStats->op_crs_c_per_90,
                'sprints_per_90' => $playerStats->sprints_per_90,
                'fa' => $playerStats->fa,
                'drb_per_90' => $playerStats->drb_per_90,
                'tck_per_90' => $playerStats->tck_per_90,
                'tck_r' => $playerStats->tck_r,
                'hdrs_w_per_90' => $playerStats->hdrs_w_per_90,
                'hdr_perc' => $playerStats->hdr_perc,
                'blk_per_90' => $playerStats->blk_per_90,
                'clr_per_90' => $playerStats->clr_per_90,
                'int_per_90' => $playerStats->int_per_90,
                'poss_won_per_90' => $playerStats->poss_won_per_90,
                'pres_c_per_90' => $playerStats->pres_c_per_90,
                'poss_lost_per_90' => $playerStats->poss_lost_per_90,
                'yel' => $playerStats->yel,
                'red' => $playerStats->red,
                'gl_mst' => $playerStats->gl_mst,
                'xgp_per_90' => $playerStats->xgp_per_90,
                'sv_perc' => $playerStats->sv_perc,
                'con_per_90' => $playerStats->con_per_90,
                'cln_per_90' => $playerStats->cln_per_90,
                'wage' => $playerStats->wage,
            ];

            return response()->json($stats);
        }

        return response()->json([]);
    }

    public function getDummyData()
    {
        $dummyData = [
            'good' => [
                [0.25, 0.75, 0.22, 0.97],
                [2.38, 0.82, 1.64, 3.18, 0.72],
                [2.36, 0.89, 3, 0.63, 6.9],
                [3.66, 3.31, 3.5, 0.47, 8.59],
                [3.88, 3.48, 3.64, 0.71, 3.03],
                [3.01, 2.75, 0.75, 3.81, 0.94],
                [1.82, 7.19, 0.33, 2.5, 0.91],
                [1.81, 0.32, 3.7, 0.88, 1.1],
                [4.69, 0.66, 18.03, 1.94, 0.36],
                [4.6, 1.34, 17.49, 0.44, 0.28],
                [3.98, 0.25, 0.52, 1.51, 0.30],
                [5.08, 3.05, 0.5, 1.57, 0.30]
            ],
            'ok' => [
                [0, 1.41, 0.1, 0.78],
                [1.29, 0.72, 0.85, 2.15, 0.42],
                [1.24, 0.64, 2.33, 0.34, 4.52],
                [2.75, 2.75, 2.48, 0.14, 6.13],
                [2.89, 2.78, 2.79, 0.25, 1.69],
                [2.16, 1.97, 0.41, 2.84, 0.90],
                [1.23, 4.86, 0.19, 1.32, 0.88],
                [1.27, 0.21, 1.85, 0.85, 0.71],
                [2.4, 0.33, 14.19, 1.15, 0.19],
                [3.01, 0.82, 14.17, 0.25, 0.16],
                [1.95, 0.14, 0.3, 0.94, 0.20],
                [2.76, 1.17, 0.35, 1.09, 0.21]
            ],
            'poor' => [
                [-0.38, 2.15, 0.04, 0.47],
                [0.8, 0.59, 0.44, 1.36, 0.19],
                [0.88, 0.39, 1.69, 0.16, 3.17],
                [1.44, 2, 1.35, 0.04, 4.14],
                [1.57, 1.89, 1.51, 0.04, 0.39],
                [1.17, 1.32, 0.2, 1.13, 0.86],
                [0.76, 2.67, 0.1, 0.43, 0.82],
                [0.75, 0.13, 0.89, 0.82, 0.37],
                [1.05, 0.1, 8.57, 0.59, 0.1],
                [1.5, 0.43, 8.24, 0.15, 0.07],
                [0.67, 0.08, 0.21, 0.64, 0.13],
                [1.03, 0.69, 0.22, 0.73, 0.15]
            ]
        ];

        return response()->json($dummyData);
    }
}