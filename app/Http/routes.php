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
    return "Security works !";
});
Route::get('/securitycheck', ['middleware' => 'jwt.auth', function () {
    return "Security works !";
}]);


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

Route::group(['prefix' => 'api'], function () {

    Route::get('featured', 'HomeController@getFeaturedSeries');

    Route::get('favourites', [
        'middleware' => 'jwt.auth',
        'uses' => 'HomeController@getFavouritesSeries'
    ]);


    // Authenticate Controller

    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');


    // Serie Controller

    Route::get('search/{string}', 'SerieController@searchSerie');

    Route::get('serie/{id}', 'SerieController@getSerie');

    Route::get('serie/filled/{id}', 'SerieController@getFilledSerie');

    Route::get('episodes/seen/{idseason}',[
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@getSeenEpisodes'
    ]);

    Route::get('episode/{id}', 'SerieController@getEpisode');

    Route::post('episode/seen/{id}/{seen}',[
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@seenEpisode'
    ]);

    Route::post('/serie/subscribe/{idserie}', [
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@subscribe'
    ]);

    Route::post('/serie/unsubscribe/{idserie}', [
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@unsubscribe'
    ]);
    
    Route::get('/serie/subscribed/{idserie}', [
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@isSubscribed'
    ]);

    // Calendar Controller
    Route::get('calendar', [
        'middleware' => 'jwt.auth',
        'uses' => 'CalendarController@getCalendarSubs'
    ]);


    // ToWatch Controller
    Route::get('towatch', [
        'middleware' => 'jwt.auth',
        'uses' => 'ToWatchController@getToWatch'
    ]);
    
    Route::post('signup', 'AuthenticateController@signUp');


    // Profile Controller
    Route::group(['prefix' => 'profile', 'middleware' => 'jwt.auth'], function () {

        Route::get('subscriptions', 'ProfileController@getSubscriptions');

        Route::post('personal', 'ProfileController@setPersonalData');

        Route::get('personal', 'ProfileController@getPersonalData');

    });

});

// Remove # from angularjs URL
Route::any('{path?}', function () {
    return view('index');
})->where("path", ".+");

