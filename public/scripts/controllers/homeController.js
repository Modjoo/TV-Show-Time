// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('HomeController', HomeController);


    function HomeController($scope, $location, featuredService, cacheService) {
        featuredService.getFeaturedSeries().then(function (response) {
            $scope.featuredSeries = response.featuredseries;
        });

        $scope.detail = function(serie){
            cacheService.setCache("selected_serie", serie);
            $location.path("/single");
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