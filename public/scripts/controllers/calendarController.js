/**
 * Created by Theo.ZIMMERMANN on 07.06.2016.
 */

// public/scripts/calendarController.js

(function () {
    'use strict';
    angular.module('serialWatcherApp').controller('CalendarController', CalendarController);


    function CalendarController($scope, calendarService, cacheService) {

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
            console.log($scope.subscription);
            $scope.events = [];

            $scope.subscription.forEach(function(episode){
                console.log(episode.title);
                $scope.events.push({date: moment(episode.release_date).format(), title: episode.title});
            });
        });

        $scope.detail = function (episode) {
            cacheService.setCache("selected_episode", episode);
        };

        $scope.showEvents = function (events) {
            alert(events.map(function (e) {
                return e.title
            }).join("\n"));
        };
    }
})();