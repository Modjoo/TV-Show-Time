<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
