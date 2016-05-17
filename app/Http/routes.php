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
    $pouet = new \App\Http\Utils\Omdb();
    $response = $pouet->searchBySeriesName("games");
    if($response->Response == "True"){
        echo "pouet";
    }
    dd($response->Response);
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

// Test omdb request
Route::controller('omdb', 'OmdbController');



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

