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

    // Home Controller
    /**
     * Get all featured series
     */
    Route::get('featured', 'HomeController@getFeaturedSeries');

    /**
     * Get favourites series from user
     */
    Route::get('favourites', [
        'middleware' => 'jwt.auth',
        'uses' => 'HomeController@getFavouritesSeries'
    ]);



    // Authenticate Controller

    Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
    Route::post('authenticate', 'AuthenticateController@authenticate');
    Route::get('authenticate/user', 'AuthenticateController@getAuthenticatedUser');

    // Serie Controller

    /**
     * Search serie from with the name
     */

    Route::get('search/{string}', 'SerieController@searchSerie');

    /**
     * Get a serie by ID from home page
     */
    Route::get('serie/{id}', 'SerieController@getSerie');

    /**
     * Get a serie with all seasons and episodes
     */
    Route::get('serie/filled/{id}', 'SerieController@getFilledSerie');

    /**
     * Get episodes seen by the user
     */
    Route::get('episodes/seen/{idseason}',[
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@getSeenEpisodes'
    ]);

    /**
     * Get episode information
     */
    Route::get('episode/{id}', 'SerieController@getEpisode');

    /**
     * Define if the user have seen the episode
     * seen: true if the user have seen the episode, false if not then will be removed from the database.
     * id: Episode id
     */
    Route::post('episode/seen/{id}/{seen}',[
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@seenEpisode'
    ]);

    /**
     * Subscribe to a serie
     */
    Route::post('/subscribe/{idserie}', [
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@subscribe'
    ]);

    /**
     * Unsubscribe from a serie
     */
    Route::post('/unsubscribe/{idserie}', [
        'middleware' => 'jwt.auth',
        'uses' => 'SerieController@unsubscribe'
    ]);

    /**
     * Return true or false if the user has subdscribed to the serie
     * isSubscribe
     */
    Route::get('/subscribed/{idserie}', [
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

    /**
     * Get all profile info
     */
    Route::get('profile', 'ProfileController@getProfile');

    Route::group(['prefix' => 'profile', 'middleware' => 'jwt.auth'], function () {

        /**
         * Get all subscriptions
         */
        Route::get('subscriptions', 'ProfileController@getSubscriptions');

        /**
         * Set personal data
         */
        Route::post('personal', 'ProfileController@setPersonalData');

        /**
         * Get personal data
         */
        Route::get('personal', 'ProfileController@getPersonalData');

    });


});

// Remove # from angularjs URL
Route::any('{path?}', function () {
    return view('index');
})->where("path", ".+");

