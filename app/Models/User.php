<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 */
class User extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'pseudo',
        'password',
        'email',
        'avatar_img',
        'birthday',
        'gender'
    ];

    protected $guarded = [];

        
}