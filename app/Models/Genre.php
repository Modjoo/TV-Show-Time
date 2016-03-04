<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model {

    protected $table = 'genres';
    protected $fillable = ['id', 'name'];


    public function series() {
        return $this->belongsToMany(\App\Models\Series::class, 'genres_series', 'genre_id', 'serie_id');
    }

    public function genresSeries() {
        return $this->hasMany(\App\Models\GenresSeries::class, 'genre_id', 'id');
    }


}
