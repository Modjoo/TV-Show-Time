<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenresSeries extends Model {

    protected $table = 'genres_series';
    protected $fillable = ['id', 'serie_id', 'genre_id'];


    public function genre() {
        return $this->belongsTo(\App\Models\Genre::class, 'genre_id', 'id');
    }

    public function series() {
        return $this->belongsTo(\App\Models\Series::class, 'serie_id', 'id');
    }


}
