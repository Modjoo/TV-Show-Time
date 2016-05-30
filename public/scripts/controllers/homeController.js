// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);


    function HomeController($http, $scope, searchService) {
        var self = this;
        var test;
        searchService.getTest("1111").then(function (data) {
            test = data;
            self.pouet(test);
        });
        console.log("data :", test);

        this.pouet = function(test){
            console.log(test);
        }
    }

    //myrgApp.controller('homeController', ['$scope', '$log', '$http',
    //    function ($scope, $log, $http) {
    //        $scope.sendJson = function () {
    //            var sendJson = {
    //                name: $scope.sendJson
    //            };
    //            $http({
    //                method: 'POST',
    //                url: '/test',
    //                data: sendJson
    //            })
    //                .success(function () {
    //                    console.log('true');
    //                })
    //                .error(function () {
    //                    console.log('false');
    //                })
    //        }
    //    }]);
})();