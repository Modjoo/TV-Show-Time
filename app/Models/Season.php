<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Season
 */
class Season extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_season',
        'title',
        'id_serie'
    ];

    protected $guarded = [];

        
}