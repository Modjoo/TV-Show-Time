<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    // Change blade tags
    Blade::setEscapedContentTags('[[', ']]');
    Blade::setContentTags('[[[', ']]]');

    return view('index');
});



Route::get('/hello', function () {
    $pouet = new \App\Http\Services\DataBaseService();


    //$pouet->findOrCreateSeriesFromExternalId("tt1332710");

    /*
    $pouet = new \App\Http\Utils\Omdb();
    $serie = $pouet->searchSerieById("tt0944947");
    $season = $pouet->getInfoSaison("tt0944947",1);
    $episode1 = $pouet->searchEpisodeById("tt1480055");

    $serie = \App\Http\Utils\JsonParser::parseSerie($serie);
    $serie->save();

    $season = \App\Http\Utils\JsonParser::parseSeason($season);
    $season->series()->associate($serie);
    $season->save();

    $episode = \App\Http\Utils\JsonParser::parseEpisode($episode1);
    $episode->season()->associate($season);
    $episode->save();*/

    /*$episode = \App\Models\Episode::where("id", '>', 0);
    dd($episode->get());*/
/*
    $serie = \App\Models\Series::where("id", '=', 1)->first();
    $serie->seasons = $serie->seasons()->get();
    dd($serie);*/

    return "It works !";
});

Route::get('/securitycheck', ['middleware' => 'jwt.auth', function () {
    return "Security works !";
}]);

Route::group(['prefix' => 'api'], function () {
    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');
});



// Remove # from angularjs URL
Route::any('{path?}', function()
{
    return view('index');
})->where("path", ".+");

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*
Route::group(['middleware' => ['web']], function () {
    //
});
*/

