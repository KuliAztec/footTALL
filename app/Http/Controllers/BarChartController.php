<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarChartController extends Controller
{
    public function index()
    {
        $players = DB::table('stats')->select('id', 'name')->get();
        $player1 = DB::table('stats')->where('id', 1)->first();
        $player2 = DB::table('stats')->where('id', 2)->first();

        $data = $this->getChartData($player1, $player2);

        return view('barchart', compact('data', 'players'));
    }

    public function getData(Request $request)
    {
        $player1 = DB::table('stats')->where('id', $request->query('player1'))->first();
        $player2 = DB::table('stats')->where('id', $request->query('player2'))->first();

        return response()->json($this->getChartData($player1, $player2));
    }

    private function getChartData($player1, $player2)
    {
        $labels = [
            'apps', 'sub', 'gls', 'ast', 'av_rat', 'mins', 'np_xg_per_90', 'conv_perc', 'shots', 
            'xg_per_shot', 'sht_per_90', 'gls_per_90', 'xg_op', 'op_kp_per_90', 'ch_c_per_90', 'pr_passes_per_90', 
            'xa_per_90', 'op_crs_c_per_90', 'pas_perc', 'tgls_per_90', 'drb_per_90', 'hdr_perc', 'int_per_90', 'blk_per_90', 
            'tcon_per_90', 'pres_c_per_90', 'gl_mst', 'gwin', 'shots_outside_box_per_90', 'xg', 'np_xg', 'pens', 
            'ps_c_per_90', 'sprints_per_90', 'fa', 'tck_per_90', 'tck_r', 'hdrs_w_per_90', 'clr_per_90', 'poss_won_per_90', 
            'poss_lost_per_90', 'yel', 'red', 'xgp_per_90', 'sv_perc', 'con_per_90', 'cln_per_90', 'wage'
        ];

        $dataset1 = $player1 ? [
            $player1->apps, $player1->sub, $player1->gls, $player1->ast, $player1->av_rat, 
            $player1->mins, $player1->np_xg_per_90, $player1->conv_perc, $player1->shots, $player1->xg_per_shot, 
            $player1->sht_per_90, $player1->gls_per_90, $player1->xg_op, $player1->op_kp_per_90, 
            $player1->ch_c_per_90, $player1->pr_passes_per_90, $player1->xa_per_90, $player1->op_crs_c_per_90, 
            $player1->pas_perc, $player1->tgls_per_90, $player1->drb_per_90, $player1->hdr_perc, 
            $player1->int_per_90, $player1->blk_per_90, $player1->tcon_per_90, $player1->pres_c_per_90, 
            $player1->gl_mst, $player1->gwin, $player1->shots_outside_box_per_90, $player1->xg, $player1->np_xg, 
            $player1->pens, $player1->ps_c_per_90, $player1->sprints_per_90, $player1->fa, $player1->tck_per_90, 
            $player1->tck_r, $player1->hdrs_w_per_90, $player1->clr_per_90, $player1->poss_won_per_90, 
            $player1->poss_lost_per_90, $player1->yel, $player1->red, $player1->xgp_per_90, $player1->sv_perc, 
            $player1->con_per_90, $player1->cln_per_90, $player1->wage
        ] : [];

        $dataset2 = $player2 ? [
            $player2->apps, $player2->sub, $player2->gls, $player2->ast, $player2->av_rat, 
            $player2->mins, $player2->np_xg_per_90, $player2->conv_perc, $player2->shots, $player2->xg_per_shot, 
            $player2->sht_per_90, $player2->gls_per_90, $player2->xg_op, $player2->op_kp_per_90, 
            $player2->ch_c_per_90, $player2->pr_passes_per_90, $player2->xa_per_90, $player2->op_crs_c_per_90, 
            $player2->pas_perc, $player2->tgls_per_90, $player2->drb_per_90, $player2->hdr_perc, 
            $player2->int_per_90, $player2->blk_per_90, $player2->tcon_per_90, $player2->pres_c_per_90, 
            $player2->gl_mst, $player2->gwin, $player2->shots_outside_box_per_90, $player2->xg, $player2->np_xg, 
            $player2->pens, $player2->ps_c_per_90, $player2->sprints_per_90, $player2->fa, $player2->tck_per_90, 
            $player2->tck_r, $player2->hdrs_w_per_90, $player2->clr_per_90, $player2->poss_won_per_90, 
            $player2->poss_lost_per_90, $player2->yel, $player2->red, $player2->xgp_per_90, $player2->sv_perc, 
            $player2->con_per_90, $player2->cln_per_90, $player2->wage
        ] : [];

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => $player1 ? $player1->name : 'player 1',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                    'data' => $dataset1
                ],
                [
                    'label' => $player2 ? $player2->name : 'player 2',
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'borderWidth' => 1,
                    'data' => $dataset2
                ]
            ]
        ];
    }
}
