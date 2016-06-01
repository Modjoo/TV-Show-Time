angular.module('authApp')
    .service('search', ['$http', '$q', function ($http, $q) {
        return {
            searchByName: function (name) {
                var d = $q.defer();
                $http.get('api/search/' + name).then(function (response) {
                    d.resolve(response.data);
                });
                return d.promise;
            }
        };
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
            return newEntity.value;
        };

        var setCache = function (key, data) {
            var e = getEntity(key);
            if (e) {
                e.value = data;
            } else {
                map.push(generateEntity({key: key, value: data}));
            }
            return data;
        };

        return {
            addToCache: addToCache,
            setCache: setCache,
            getData: getData
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
