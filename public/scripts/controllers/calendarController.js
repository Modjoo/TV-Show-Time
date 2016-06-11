/**
 * Created by Theo.ZIMMERMANN on 07.06.2016.
 */

// public/scripts/calendarController.js

(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('CalendarController', CalendarController);


    function CalendarController($scope, $location, calendarService, cacheService) {
        calendarService.getSubscriptions().then(function (response) {
            $scope.subscription = response.subscription;
            angular.forEach($scope.subscription, function(episode){
                $scope.events.push({date:episode.release_date, title:episode.title});
                console.log($scope.events);

            });
        });

        $scope.detail = function (episode) {
            cacheService.setCache("selected_episode", episode);
        };

        $scope.options = {
            weekOffset: 1,
            daysOfTheWeek: ['ZO', 'MA', 'DI', 'WO', 'DO', 'VR', 'ZA'],
            constraints: {
                startDate: moment().subtract(1, 'months').format('YYYY-MM-15'),
                endDate: moment().add(2, 'months').format('YYYY-MM-15')
            }
        };
        $scope.events = [
            /*
            {date: moment().add(3, 'days').format(), title: "Happy days"},
            {date: moment().subtract(5, 'days').format(), title: "Good old days"},
            {date: moment().subtract(5, 'days').format(), title: "And some more"}
            */
        ];
        $scope.showEvents = function (events) {
            alert(events.map(function (e) {
                return e.title
            }).join("\n"));
        };

    }


})();