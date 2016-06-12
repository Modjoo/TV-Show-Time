(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('ToWatchController', ToWatchController);


    function ToWatchController($scope, toWatchService,episodeService) {
        toWatchService.toWatch().then(function(toWatch){
            $scope.toWatch = toWatch.series;
            console.log( $scope.toWatch );
        });
        $scope.episodeSelected = function(episode){
            if(angular.isUndefined(episode.isWatched)){
                episode.isWatched = true;
            }else{
                episode.isWatched = !episode.isWatched;
            }
            episodeService.setSeenEpisode(episode.id, episode.isWatched );
        }
    }
})();