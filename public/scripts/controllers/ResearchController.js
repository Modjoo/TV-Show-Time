// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('ResearchController', ResearchController);


    function ResearchController($http, $scope, search, cacheService) {
        $scope.data = cacheService.getData("searchResults");
    }
})();