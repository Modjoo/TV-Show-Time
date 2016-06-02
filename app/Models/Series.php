<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Series extends Model
{

    protected $table = 'series';
    protected $fillable = ['id', 'title', 'synopsis', 'cover_img_url', 'actors', 'producer', 'duration_pattern', 'number', 'isfilled', 'external_id'];
    public $timestamps = false;


    public function genres()
    {
        return $this->belongsToMany(\App\Models\Genre::class, 'genres_series', 'serie_id', 'genre_id');
    }

    public function genresSeries()
    {
        return $this->hasMany(\App\Models\GenresSeries::class, 'serie_id', 'id');
    }

    public function seasons()
    {
        return $this->hasMany(\App\Models\Season::class, 'serie_id', 'id');
    }

    public function scopeFeatured($query)
    {
        return DB::select(DB::raw('select * from series where id > ( (select COUNT(*) from series) - 10)'));
    }
}
