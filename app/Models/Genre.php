<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 *
 * Each serie has a genre
 *
 * */

class Genre extends Model {

    protected $table = 'genres';
    protected $fillable = ['id', 'name'];
    public $timestamps = false;


    public function series() {
        return $this->belongsToMany(\App\Models\Series::class, 'genres_series', 'genre_id', 'serie_id');
    }

    public function genresSeries() {
        return $this->hasMany(\App\Models\GenresSeries::class, 'genre_id', 'id');
    }


}
