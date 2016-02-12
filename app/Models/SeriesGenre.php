<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SeriesGenre
 */
class SeriesGenre extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_series_genre',
        'id_serie',
        'id_genre'
    ];

    protected $guarded = [];

        
}