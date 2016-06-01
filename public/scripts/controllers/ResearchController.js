// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('authApp')
        .controller('ResearchController', ResearchController);


    function ResearchController($scope, $rootScope, cacheService) {
        $scope.data = cacheService.getData("searchResults");
        $rootScope.$on("UpdateSearch", function(event, data){
            console.log("data ", data);
            $scope.data = data.data;
        });

        $scope.detail = function(serie){
            console.log("dsadasdas : ", serie);
        }
      
    }
})();