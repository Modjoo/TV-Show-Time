// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('NavController', NavController);


    function NavController($location, $scope, search, cacheService) {
        $scope.searchText = '';
        console.log("nav controlelr loadign");

        $scope.pouet = function(){
            console.log("pouet");
            $location.path("/landing");
        };
        $scope.search = function(){
            search.searchByName($scope.searchText).then(function(result){
                cacheService.addToCache("searchResults", result);
                console.log("search !");
                $location.path("/landing");
            });

        };
    }
})();