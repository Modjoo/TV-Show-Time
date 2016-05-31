// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);


    function HomeController($location, $scope, search, cacheService) {
        $scope.searchText = 'Search';

        // TODO: Créer un controller pour la barre de navigation !
        // TODO: Historique de la recherche


        $scope.search = function(){
            search.searchByName($scope.searchText).then(function(result){
                cacheService.addToCache("searchResults", result);
                $location.path("/landing");
            });

        };



        /*
        var self = this;
        var test;
        searchService.sendData({name:'pouet', id:'loool'});
        searchService.getTest("1111").then(function (data) {
            test = data;
            self.pouet(test);
        });
        console.log("data :", test);

        this.pouet = function(test){
            console.log(test);
        }*/
    }
})();