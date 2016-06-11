// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('SingleController', SingleController);


    // TODO: Implémenter toutes la logique pour rechercher les saisons, ainsi que tous les épisodes
    // TODO: Implémenter la gestion des profils pour gérer ces épisodes vus ou non.

    function SingleController($scope, $http, $rootScope,seriesService, cacheService) {
        $scope.serie = cacheService.getData("selected_serie");
        $scope.episodes = null;

        seriesService.getFilledSerie($scope.serie.id).then(function(filled){
            $scope.seasonFilled = filled;
        }, function(response){
            console.error("get filled serie error ", response);
        });

        $scope.$watch('selectedEpisodes', function (selecedSeasonHashKey) {
            if($scope.seasonFilled && $scope.seasonFilled.seasons){
                $scope.seasonFilled.seasons.forEach(function (filled){
                   if(filled.$$hashKey == selecedSeasonHashKey){
                       $scope.episodes = filled.episodes;
                   }
                });
            }
            //$scope.episodes = selecedSerieId;
        });

        $scope.$watch('episodes', function (episodes) {
            // Partie qui définit si il as vus un épisodes ou non
            // gestion du click si il n'est pas log.
            console.log(episodes);
        });

        $scope.episodeSelected = function(episode){
          console.log("click : ", episode);
        };


        //TODO: Test send request http and get authenticate user ! for authenticate user
        $scope.subscribe = function () {
            $http.get('api/auth/test').then(function (response) {
                console.log(response);
            }, function (response) {
                console.error("big error !");
            });
        }

    }
})();