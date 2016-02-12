<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Series
 */
class Series extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_serie',
        'title',
        'synopsis',
        'cover_img_url',
        'actors',
        'producer',
        'duration_pattern'
    ];

    protected $guarded = [];

        
}