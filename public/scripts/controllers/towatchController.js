(function () {
    'use strict';
    angular.module('serialWatcherApp') .controller('ToWatchController', ToWatchController);

    /**
     * Display the lists of all episodes not yet seen by the users.
     * @param $scope
     * @param toWatchService
     * @param episodeService
     * @constructor
     */
    function ToWatchController($scope, toWatchService,episodeService) {

        // Load all unseen episodes by current user
        toWatchService.toWatch().then(function(toWatch){
            $scope.toWatch = toWatch.series;
        });
        
        // Toggle watched episode
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