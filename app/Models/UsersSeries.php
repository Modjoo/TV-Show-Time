<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/*
 *
 * Linking table that allows us to display every series that the user's following
 *
 */

class UsersSeries extends Model {

    protected $table = 'users_series';
    protected $fillable = ['id', 'user_id', 'serie_id'];
    public $timestamps = false;


    public function user() {
        return $this->belongsTo(\App\Models\Genre::class, 'user_id', 'id');
    }

    public function series() {
        return $this->belongsTo(\App\Models\Series::class, 'serie_id', 'id');
    }

}
