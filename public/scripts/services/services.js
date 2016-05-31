angular.
module('authApp').factory('searchService', ['$http','$q', function ($http, $q) {
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
}]);