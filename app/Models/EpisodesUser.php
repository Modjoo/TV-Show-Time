<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/*
 *
 * Link between the user and each episode he watched
*/
class EpisodesUser extends Model {

    protected $table = 'episodes_users';
    protected $fillable = ['id', 'user_id', 'episode_id'];
    public $timestamps = false;


    public function episode() {
        return $this->belongsTo(\App\Models\Episode::class, 'episode_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


}
