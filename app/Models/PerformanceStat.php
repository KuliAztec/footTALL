<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceStat extends Model
{
    use HasFactory;

    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uid',
        'name',
        'position',
        'age',
        'height',
        'weight',
        'club',
        'national',
        'preferred_foot',
        'apps',
        'minutes',
        'subs',
        'goals',
        'xG',
        'shots',
        'assists',
        'xA',
        'key_passes',
        'progressive_passes',
        'tackles_completed',
        'interceptions',
        'clearances',
        'blocks',
        'possession_won_per_90',
        'possession_lost_per_90',
        'clean_sheets',
        'goals_conceded',
        'total_distance',
        'headers_won_per_90',
        'headers_lost_per_90',
        'aerial_duels_per_90',
        'yellow_cards',
        'red_cards',
        'fouls',
    ];
}
