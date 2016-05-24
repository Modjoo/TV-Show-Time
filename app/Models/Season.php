<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model {

    protected $table = 'seasons';
    protected $fillable = ['id', 'title', 'number', 'external_id', 'serie_id'];
    public $timestamps = false;


    public function series() {
        return $this->belongsTo(\App\Models\Series::class, 'serie_id', 'id');
    }

    public function episodes() {
        return $this->hasMany(\App\Models\Episode::class, 'season_id', 'id');
    }


}
