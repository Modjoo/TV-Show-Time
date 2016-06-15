<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/*
 *
 * Contains informations about a serie
 *
 */

class Series extends Model
{

    protected $table = 'series';
    protected $fillable = ['id', 'title', 'synopsis', 'cover_img_url', 'actors', 'producer', 'duration_pattern', 'number', 'isfilled', 'external_id'];
    public $timestamps = false;


    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genres_series', 'serie_id', 'genre_id');
    }

    public function genresSeries()
    {
        return $this->hasMany(GenresSeries::class, 'serie_id', 'id');
    }

    public function seasons()
    {
        return $this->hasMany(Season::class, 'serie_id', 'id');
    }

    public function scopeFeatured()
    {
        return Series::take(10)->get();
    }
}
