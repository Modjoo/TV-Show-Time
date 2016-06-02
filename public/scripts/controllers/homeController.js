// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);


    function HomeController($scope, featuredService) {
        featuredService.getFeaturedSeries().then(function (response) {
            $scope.featuredSeries = response.featuredseries;
        });


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