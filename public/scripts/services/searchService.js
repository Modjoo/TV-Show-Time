angular.
module('authApp', []).
service('searchService', function(){
    var restQuery = './Search/'
    this.searchWithOmdb = function($scope, $http){
        $http.get(restQuery/).
        success(function(data){

        });
    }

});