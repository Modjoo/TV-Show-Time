angular.module('serialWatcherApp')
    .service('search', ['$http', '$q', function ($http, $q) {
        return {
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
            getFilledSerie: function(serieId){
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
    .service('featuredService', ['$http', '$q', function ($http, $q) {
        return {
            getFeaturedSeries: function () {
                var d = $q.defer();
                $http.get('api/featured').then(function (response) {
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
                $http.get('api/calendar/{iduser}').then(function (response) {
                    d.resolve(response.data);
                });
                return d.promise;
            }
        };
    }])
    .service('cacheService', function ($window) {
        var map = [];

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
        var addToCache = function (key, data) {
            var e = getEntity(key);
            var newEntity = generateEntity({key: key, value: data});
            if (e != null) {
                var nvalue = angular.merge({}, newEntity.value, e.value);
                newEntity.value = nvalue;
                e.value = nvalue;
            } else {
                map.push(newEntity);
            }
            saveCache();
            return newEntity.value;
        };

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
            saveCache: saveCache,
            setCache: setCache,
            clear: clear,
            getData: getData
        }
    })
    .service('subscribeService', function($http, $q){
        return{
            subscribeToSerie: function(idSerie){
                var d = $q.defer();
                $http.post('api/subscribe/' + idSerie).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            unsubscribeToSerie: function(idSerie){
                var d = $q.defer();
                $http.post('api/unsubscribe/' + idSerie).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            isSubscribed: function(idSerie){
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
    .service('episodeService', function($http, $q){
        return{
            setSeenEpisode: function(episodeId, seen){
                var d = $q.defer();
                $http.post('api/episode/seen/'+ episodeId +'/' + seen).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            getWatchedEpisodes: function(idSeason){
                var d = $q.defer();
                $http.get('api/episodes/seen/' + idSeason).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    }).service('profileService', function($http, $q){
        return{
            getProfile: function(){
                var d = $q.defer();
                $http.get('api/profile/personal').then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            },
            setProfile: function(user){
                var d = $q.defer();
                $http.post('api/profile/personal', user).then(function (response) {
                    d.resolve(response.data);
                }, function (response) {
                    d.reject(response);
                });
                return d.promise;
            }
        }
    });


// EXAMPLE !!
/*
 return {
 getTest: function (json) {
 var d = $q.defer();
 $http.get('api/testjson').then(function (response) {
 console.log(response);
 d.resolve(response.data);
 //return response;
 });
 return d.promise;
 },
 sendData: function(json){
 var d = $q.defer();
 $http.post('api/testjsons', json).then(function(response){
 console.log("menu : ", response);
 d.resolve(true);
 });
 }
 }
 */
