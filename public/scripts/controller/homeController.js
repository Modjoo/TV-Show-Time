// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('HomeController', HomeController);


    function HomeController($state, $http, $rootScope) {
        console.log("debug");
    }
})();