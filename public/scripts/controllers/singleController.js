// public/scripts/authController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('SingleController', SingleController);


    // TODO: Implémenter toutes la logique pour rechercher les saisons, ainsi que tous les épisodes
    // TODO: Implémenter la gestion des profils pour gérer ces épisodes vus ou non.

    function SingleController($scope, $location, seriesService, subscribeService, episodeService, cacheService) {
        $scope.serie = cacheService.getData("selected_serie");
        $scope.selectedSeasonId = null;
        $scope.episodes = null;
        $scope.isSubscribe = false;
        var isLogged = localStorage.getItem("user") != null;

        var user = localStorage.getItem("user");

        if (isLogged) {
            subscribeService.isSubscribed($scope.serie.id).then(function (response) {
                $scope.isSubscribe = response.subscribe;
            });
        }

        seriesService.getFilledSerie($scope.serie.id).then(function (filled) {
            $scope.seasonFilled = filled;
        }, function (response) {
            console.error("get filled serie error ", response);
        });

        $scope.$watch('selectedSeason', function (selecedSeasonHashKey) {
            if ($scope.seasonFilled && $scope.seasonFilled.seasons) {
                $scope.seasonFilled.seasons.forEach(function (filled) {
                    if (filled.$$hashKey == selecedSeasonHashKey) {
                        $scope.selectedSeasonId = filled.season.id;
                        if (isLogged) {
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

        var isWatched = function (episodeId, watchedEpisodeList) {
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

        var mergeWatchedEpisode = function (episodeList, watchedEpisodeList) {
            var finalEpisodeList = [];
            if (episodeList != null && watchedEpisodeList != null) {
                episodeList.forEach(function (episode) {
                    var watched = isWatched(episode.id, watchedEpisodeList);
                    episode.isWatched = watched;
                    finalEpisodeList.push(episode);
                });
            }
            return finalEpisodeList;
        };

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

        $scope.episodeSelected = function (episode) {
            console.log("click : ", episode);
            if ($scope.selectedSeasonId != null && isLogged) {
                episode.isWatched = !episode.isWatched;
                episodeService.setSeenEpisode(episode.id, episode.isWatched);
            } else {
                $location.path('/auth');
            }
        };

    }
})();