angular.module('serialWatcherApp')
// This service allows you to search a serie using its name
    .service('search', ['$http', '$q', function ($http, $q) {
        return {
            /**
             * Search serie by name
             * @param name {String} query name
             * @returns {d.promise}
             */
            searchByName: function (name) {
                var d = $q.defer();
                $http.get('api/search/' + name).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        };
    }])
    // Retrieves all information about a series ( seasons and episodes).
    .service('seriesService', ['$http', '$q', function ($http, $q) {
        return {
            /**
             * Get a full serie with all seasons and all episodes.
             * @param serieId {Integer} PK of the serie.
             * @returns {d.promise}
             */
            getFilledSerie: function (serieId) {
                var d = $q.defer();
                $http.get('api/serie/filled/' + serieId).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    }])
    // Retrieves favorites or featured series.
    .service('homeService', ['$http', '$q', function ($http, $q) {
        return {
            getFeaturedSeries: function () {
                var d = $q.defer();
                $http.get('api/featured').then(function (response) {
                    d.resolve(response.data);
                });
                return d.promise;
            },
            getFavouriteSeries: function () {
                var d = $q.defer();
                $http.get('api/favourites').then(function (response) {
                    d.resolve(response.data);
                });
                return d.promise;
            }
        };
    }])
    // Retrieves a list of episodes for the series which the user subscribes and which
    // the episode are not yet out
    .service('calendarService', ['$http', '$q', function ($http, $q) {
        return {
            getSubscriptions: function () {
                var d = $q.defer();
                $http.get('api/calendar').then(function (response) {
                    d.resolve(response.data);
                });
                return d.promise;
            }
        };
    }])
    /**
     * Add or delete data (stored inside a variable like hashmap) (Stored in local storage).
     */
    .service('cacheService', function ($window) {
        var map = [];

        // This is one entity like Hash map
        // key  = id
        // Value = the data.
        var generateEntity = function (params) {
            return {
                key: params.key,
                value: params.value
            }
        };

        var getData = function (key) {
            var e = getEntity(key);
            if (e != null) {
                return e.value;
            }

            return null;
        };

        // Retrieve the entity with the key
        var getEntity = function (key) {
            reloadCache();
            var selected = null;
            map.forEach(function (c) {
                if (c.key == key) {
                    selected = c;
                }
            });
            return selected;
        };

        // Allows the user to add data.
        var setCache = function (key, data) {
            var e = getEntity(key);
            if (e) {
                e.value = data;
            } else {
                map.push(generateEntity({key: key, value: data}));
            }
            saveCache();
            return data;
        };

        var reloadCache = function () {
            map = JSON.parse($window.localStorage.getItem('cacheServices'));
            if (!map) {
                map = [];
            }
        };
        var saveCache = function () {
            $window.localStorage.setItem('cacheServices', JSON.stringify(map));
        };
        var clear = function () {
            localStorage.removeItem('cacheServices');
        };

        return {
            setCache: setCache,
            clear: clear,
            getData: getData
        }
    })
    // Subscribe or unsubscribe a user to a serie.
    // It also shows whether the user has already subscribe to a serie
    .service('subscribeService', function ($http, $q) {
        return {
            /**
             * Subscribe the user to a serie
             * @param idSerie {Integer} serie id (PK).
             * @returns {d.promise}
             */
            subscribeToSerie: function (idSerie) {
                var d = $q.defer();
                $http.post('api/subscribe/' + idSerie).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            /**
             * Unsubscribe the user to a serie
             * @param idSerie {Integer} serie id (PK).
             * @returns {d.promise}
             */
            unsubscribeToSerie: function (idSerie) {
                var d = $q.defer();
                $http.post('api/unsubscribe/' + idSerie).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            /**
             * Indicates whether the user has subscribed or not to a serie
             * @param idSerie {Integer} serie id (PK).
             * @returns {d.promise} subscribe: true or false
             */
            isSubscribed: function (idSerie) {
                var d = $q.defer();
                $http.get('api/subscribed/' + idSerie).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    })
    // Retrieves a list of episodes that the user has already seen for a given season.
    .service('episodeService', function ($http, $q) {
        return {
            /**
             * Define if the user have seen the episode.
             * @param episodeId {Integer} id episode (PK)
             * @param seen {Boolean} true if the user have watched the episode
             * @returns {d.promise}
             */
            setSeenEpisode: function (episodeId, seen) {
                var d = $q.defer();
                $http.post('api/episode/seen/' + episodeId + '/' + seen).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            /**
             * Retrieve the list of episodes seen by users.
             * @param idSeason
             * @returns {d.promise} with list of episodes
             */
            getWatchedEpisodes: function (idSeason) {
                var d = $q.defer();
                $http.get('api/episodes/seen/' + idSeason).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    })
    // Retrieves all information related to the authenticated user.
    // It also allows to update this information .
    .service('profileService', function ($http, $q) {
        return {
            /**
             * Retrieves all user profile information.
             * @returns {d.promise} with user object
             */
            getProfile: function () {
                var d = $q.defer();
                $http.get('api/profile/personal').then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            /**
             * Set user's profile informations.
             * @param user {User} Need to be a user object.
             * @returns {d.promise}
             */
            setProfile: function (user) {
                var d = $q.defer();
                $http.post('api/profile/personal', user).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    })
    // Gets all the episodes that the user must still watch.
    .service('toWatchService', function ($http, $q) {
        return {
            /**
             * Retrieve a list of series that contains the seasons and episodes that the user has to watch.
             * @returns {d.promise} with list of series
             */
            toWatch: function () {
                var d = $q.defer();
                $http.get('api/towatch').then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    }).service('signUpService', function ($http, $q) {
    return {
        /**
         *  SignUp the new user
         * @param user {Object} must contains : {pseudo, password, birthday, gender}
         * @returns {d.promise}
         */
        signUp: function (user) {
            var d = $q.defer();
            $http.post('api/signup', user).then(function (response) {
                d.resolve(response.data);
            }, function (response) {
                d.reject(response);
            });
            return d.promise;
        }
    }
})
// This service will retrieve the authentication information.
    .service('authenticateService', function ($rootScope, $auth, $http) {
        return {
            /**
             * Get the authenticate token, if the user is valid.
             * @param credentials contains {pseudo:'foo', password:'bar'}
             * @returns {promise} with : the authenticated user.
             */
            authenticate: function (credentials) {
                return $auth.login(credentials).then(function () {
                    //Return an $http request for the now authenticated user
                    return $http.get('api/authenticate/user');
                }, function (error) {
                    return error;
                }).then(function (response) {

                    // Stringify the returned data for the local storage
                    var user = JSON.stringify(response.data.user);

                    if (angular.isDefined(user)) {
                        // Set the stringified user data into local storage
                        localStorage.setItem('user', user);
                    }

                    // Define the user logged in
                    $rootScope.authenticated = true;

                    // Putting the user's data on the rootScop
                    // allows us to access it anywhere
                    $rootScope.currentUser = response.data.user;
                    // Authenticated user
                    return response.data.user;
                });
            }
        }
    });