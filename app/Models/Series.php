<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model {

    protected $table = 'series';
    protected $fillable = ['id', 'title', 'synopsis', 'cover_img_url', 'actors', 'producer', 'duration_pattern'];
    protected $seasons = [];
    public $timestamps = false;


    public function genres() {
        return $this->belongsToMany(\App\Models\Genre::class, 'genres_series', 'serie_id', 'genre_id');
    }

    public function genresSeries() {
        return $this->hasMany(\App\Models\GenresSeries::class, 'serie_id', 'id');
    }

    public function seasons() {
        return $this->hasMany(\App\Models\Season::class, 'serie_id', 'id');
    }


}
