<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Episode
 */
class Episode extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_episode',
        'title',
        'duration',
        'description',
        'number',
        'release_date',
        'cover_img_url',
        'id_season'
    ];

    protected $guarded = [];

        
}