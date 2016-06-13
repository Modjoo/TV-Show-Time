angular.module('serialWatcherApp')
    // This service allows you to search a series using its name
    .service('search', ['$http', '$q', function ($http, $q) {
        return {
            /**
             * Search serie by the name
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
    .service('seriesService', ['$http', '$q', function ($http, $q) {
        return {
            /**
             * Get a full serie with all saisons and all episodes.
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
    // Add or delete data (stored inside on variable like hashmap) (Store in local storage).
    .service('cacheService', function ($window) {
        var map = [];

        // This is one entity like Hash map
        // Key the id.
        // Value the data.
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
    // Subscribe or unsubscribe a user of a series.
    // It also shows whether the user is already registered for a series.
    .service('subscribeService', function ($http, $q) {
        return {
            /**
             * Subscribe the user to a series
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
             * Unsubscribe the user to a series
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
             * Indicates whether the user is subscribed or not to a series
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
    //
    .service('episodeService', function ($http, $q) {
        return {
            /**
             * Define if the user have seen the episode.
             * @param episodeId {Integer} id episode (PK)
             * @param seen {Boolean} true if the user have watched
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
    }).service('profileService', function ($http, $q) {
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
         * Set user profile information.
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
}).service('toWatchService', function ($http, $q) {
    return {
        /**
         * Retrive a series lists containing the seasons and episodes that the user must watch.
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
         * Retrive a series lists containing the seasons and episodes that the user must watch.
         * @returns {d.promise} with list of series
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
}).service('authenticateService', function($rootScope,$auth,$http){
    return {
        /**
         * 
         * @param credentials contains {pseudo:'foo', password:'bar'}
         * @returns {*}
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

                if(angular.isDefined(user)){
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