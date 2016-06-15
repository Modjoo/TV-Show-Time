<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 *
 * Contains personnal user informations
 *
 * */

class User extends Model {

    protected $table = 'users';
    protected $fillable = ['pseudo', 'avatar_img','password', 'birthday', 'gender', 'updated_at'];
    protected $guarded = ['id'];
    public $timestamps = false;


    public function episodes() {
        return $this->belongsToMany(\App\Models\Episode::class, 'episodes_users', 'user_id', 'episode_id');
    }

    public function episodesUsers() {
        return $this->hasMany(\App\Models\EpisodesUser::class, 'user_id', 'id');
    }


}
