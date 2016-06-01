// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('ResearchController', ResearchController);


    function ResearchController($scope, cacheService) {
        console.log("research controller !");
        $scope.data = cacheService.getData("searchResults");
    }
})();