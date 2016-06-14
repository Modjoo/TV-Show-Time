/**
 * Created by Theo.ZIMMERMANN on 07.06.2016.
 */

// public/scripts/calendarController.js

(function () {
    'use strict';
    angular.module('serialWatcherApp').controller('CalendarController', CalendarController);


    function CalendarController($scope, $location, seriesService, calendarService, modalService, cacheService) {

        $scope.options = {
            weekOffset: 1,
            daysOfTheWeek: ['ZO', 'MA', 'DI', 'WO', 'DO', 'VR', 'ZA'],
            constraints: {
                startDate: moment().subtract(1, 'months').format('YYYY-MM-15'),
                endDate: moment().add(2, 'months').format('YYYY-MM-15')
            }
        };


        calendarService.getSubscriptions().then(function (response) {
            $scope.subscription = response.subscription;
            $scope.events = [];

            $scope.subscription.forEach(function (episode) {
                $scope.events.push({date: moment(episode.release_date).format(), title: episode.title});
            });
        });

        $scope.detail = function (episode) {
            cacheService.setCache("selected_episode", episode);
            seriesService.getFilledSerie(episode.serie_id).then(function (response) {
                cacheService.setCache("selected_serie", response.serie);
                $location.path("/single");
            });
        };

        $scope.showEvents = function (events) {
            var episodeName = [];
            events.forEach(function(event){
                episodeName.push({p:event.title});
            });
            modalService.openDialogModal("Episode", null, {bodyList: episodeName});
        };
    }
})();