// public/scripts/authController.js

(function () {
    'use strict';
    angular.module('serialWatcherApp').controller('SingleController', SingleController);

    /**
     * Display the main page of a serie.
     * The user can subscribe or not a serie and say whether or not he saw the episode of the serie.
     * @param $scope
     * @param $location
     * @param seriesService
     * @param subscribeService
     * @param episodeService
     * @param cacheService
     * @constructor
     */
    function SingleController($scope, $location, seriesService, subscribeService, episodeService, cacheService) {
        $scope.serie = cacheService.getData("selected_serie");
        $scope.selectedSeasonId = null;
        $scope.episodes = null;
        $scope.isSubscribe = false;
        
        var isLogged = localStorage.getItem("user") != null;

        var user = localStorage.getItem("user");

        /**
         * Compare the id of episodes.
         * @param episodeId {Integer}
         * @param watchedEpisodeList {Array}
         * @returns {boolean} true if it encounters an episode with the same id.
         */
        var isWatchedEpisode = function (episodeId, watchedEpisodeList) {
            var isWatched = false;
            if (watchedEpisodeList != null) {
                watchedEpisodeList.some(function (watched) {
                    if (episodeId == watched.id) {
                        isWatched = true;
                        return true;
                    }
                });
            }
            return isWatched;
        };

        /**
         * Compare two episodes list and determines whether the user watched these episodes
         * @param episodeList {Array} All episodes from the seasons
         * @param watchedEpisodeList {Array} episodes watched by the user form the saisons
         * @returns {Array} an list of episodes with the params isWatcher {boolean}
         */
        var mergeWatchedEpisode = function (episodeList, watchedEpisodeList) {
            var finalEpisodeList = [];
            if (episodeList != null && watchedEpisodeList != null) {
                episodeList.forEach(function (episode) {
                    var watched = isWatchedEpisode(episode.id, watchedEpisodeList);
                    episode.isWatched = watched;
                    finalEpisodeList.push(episode);
                });
            }
            return finalEpisodeList;
        };

        /**
         * If the user is authenticate
         */
        if (isLogged) {
            // check if the user is subscribed to the series.
            subscribeService.isSubscribed($scope.serie.id).then(function (response) {
                $scope.isSubscribe = response.subscribe;
            });
        }

        // Request the api for getting all data (seasons and episodes) from one serie.
        // This will take a while if there are no data on the database.
        seriesService.getFilledSerie($scope.serie.id).then(function (filled) {
            $scope.seasonFilled = filled;
        }, function (response) {
            console.error("get filled serie error ", response);
        });

        // If the user select a season
        $scope.$watch('selectedSeason', function (selecedSeasonHashKey) {
            // Check if there are a season filled.
            if ($scope.seasonFilled && $scope.seasonFilled.seasons) {
                $scope.seasonFilled.seasons.forEach(function (filled) {
                    // compare the user selection with all seasons of the list.
                    if (filled.$$hashKey == selecedSeasonHashKey) {
                        $scope.selectedSeasonId = filled.season.id;

                        if (isLogged) { // If the user is logged request the seen episode list
                            episodeService.getWatchedEpisodes($scope.selectedSeasonId).then(function (epiodesWatched) {
                                $scope.episodes = mergeWatchedEpisode(filled.episodes, epiodesWatched.episodes);
                            });
                        } else {
                            $scope.episodes = filled.episodes;
                        }

                    }
                });
            }
        });

        $scope.subscribe = function (serie) {
            subscribeService.subscribeToSerie(serie.id).then(function (result) {
                $scope.isSubscribe = true;
            });
        };

        $scope.unsubscribe = function (serie) {
            subscribeService.unsubscribeToSerie(serie.id).then(function (result) {
                $scope.isSubscribe = false;
            });
        };

        // Episode watched toggel
        $scope.episodeSelected = function (episode) {
            if ($scope.selectedSeasonId != null && isLogged) {
                episode.isWatched = !episode.isWatched;
                episodeService.setSeenEpisode(episode.id, episode.isWatched);
            } else {
                $location.path('/auth');
            }
        };

    }
})();