<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 *
 * Contains 2 important elements, the "isfilled" that indicates if the episode has been fully developped
 * During the research of a season using the API, we have plenty of informations about the episodes
 * which allows us to avoid doing request for each episode during the  generation of the season
 * the "serie_id" to facilitate the generation of the "ToWatch" and "Calendar" views.
 *
 * */

/**
 * Contains 2 important elements, the "isfilled" that indicates if the episode has been fully developped
 * During the research of a season using the API, we have plenty of informations about the episodes
 * which allows us to avoid doing request for each episode during the  generation of the season
 * the "serie_id" to facilitate the generation of the "ToWatch" and "Calendar" views.
 * 
 * Class Episode
 * @package App\Models
 */
class Episode extends Model {

    protected $table = 'episodes';
    protected $fillable = ['id', 'title', 'duration', 'description', 'number', 'release_date', 'cover_img_url', 'season_id', 'external_id', 'isfilled'];
    public $timestamps = false;


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
