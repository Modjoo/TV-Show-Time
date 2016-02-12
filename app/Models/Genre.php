<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 */
class Genre extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_genre',
        'name'
    ];

    protected $guarded = [];

        
}