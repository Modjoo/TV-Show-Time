// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('SingleController', SingleController);


    // TODO: Implémenter toutes la logique pour rechercher les saisons, ainsi que tous les épisodes
    // TODO: Implémenter la gestion des profils pour gérer ces épisodes vus ou non.

    function SingleController($scope, seriesService, subscribeService, cacheService) {
        $scope.serie = cacheService.getData("selected_serie");
        $scope.episodes = null;
        $scope.isSubscribe = false;

        var user = localStorage.getItem("user");

        if(user){
            subscribeService.isSubscribed($scope.serie.id).then(function(response){
                $scope.isSubscribe = response.subscribe;
            });
        }

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
        });

        $scope.$watch('episodes', function (episodes) {
            // Partie qui définit si il as vus un épisodes ou non
            // gestion du click si il n'est pas log.
            console.log(episodes);
        });
        
        $scope.subscribe = function(serie){
            subscribeService.subscribeToSerie(serie.id).then(function(result){
                $scope.isSubscribe = true;
            });
        };
        
        $scope.unsubscribe = function(serie){
            subscribeService.unsubscribeToSerie(serie.id).then(function(result){
                $scope.isSubscribe = false;
            });
        };

        $scope.episodeSelected = function(episode){
          console.log("click : ", episode);
        };

    }
})();