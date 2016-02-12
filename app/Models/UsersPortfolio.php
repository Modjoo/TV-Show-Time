<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersPortfolio
 */
class UsersPortfolio extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_user_portfolio',
        'id_user',
        'id_episode'
    ];

    protected $guarded = [];

        
}