<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model {

    protected $table = 'episodes';
    protected $fillable = ['id', 'title', 'duration', 'description', 'number', 'release_date', 'cover_img_url', 'season_id'];


    public function season() {
        return $this->belongsTo(\App\Models\Season::class, 'season_id', 'id');
    }

    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'episodes_users', 'episode_id', 'user_id');
    }

    public function episodesUsers() {
        return $this->hasMany(\App\Models\EpisodesUser::class, 'episode_id', 'id');
    }


}
