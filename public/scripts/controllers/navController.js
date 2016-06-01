// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('NavController', NavController);


    function NavController($location, $rootScope, $scope, search, cacheService) {
        $scope.searchText = '';

        $scope.search = function(){
            search.searchByName($scope.searchText).then(function(result){
                cacheService.addToCache("searchResults", result);
                $rootScope.$emit("UpdateSearch", {
                    data: result
                });
                $location.path("/landing")
            });
        };
    }
})();