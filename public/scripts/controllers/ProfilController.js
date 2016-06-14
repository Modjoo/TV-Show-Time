(function () {

    'use strict';

    angular.module('serialWatcherApp').controller('ProfilController', ProfilController);


    /**
     * This controller is use for changes the user's profile
     * @param $location
     * @param $scope
     * @param $filter
     * @param profileService
     * @constructor
     */
    function ProfilController($location, $scope, $filter, profileService, subscribeService,modalService, cacheService) {

        $scope.series = [];

        var seriesIsEmptyTest = function(){
            $scope.seriesIsEmpty = $scope.series.length <= 0;
        };

        // Get user data.
        profileService.getProfile().then(function (result) {
            var user = result.user;
            // Convert the birthday date from the database.
            user.birthday = new Date(user.birthday);
            $scope.user = user;
        });

        // Update the user profile
        $scope.update = function (user) {
            var sendUser = angular.merge({}, user);
            sendUser.birthday = $filter('date')(user.birthday, 'yyyy-MM-dd');
            profileService.setProfile(sendUser).then(function () {
                localStorage.setItem("user", JSON.stringify(sendUser));
                modalService.openDialogModal("Update", "User profile successfully updated");
            }, function (error) {
                console.error("error when update profile ");
                modalService.openDialogModal("Error", "Error updating the user profile");
            });
        };

        profileService.getSubscriptions().then(function (result) {
            $scope.series = result.series;
            $scope.series.forEach(function (serie){
                serie.isSubscribe = true;
            });
            seriesIsEmptyTest();
        });

        $scope.detail = function (serie) {
            cacheService.setCache("selected_serie", serie);
            $location.path("/single");
        };

        $scope.unsubscribe = function(serie){
            //subscribeService.unsubscribeToSerie(serie.id);
            $scope.series.splice($scope.series.indexOf(serie), 1);
            seriesIsEmptyTest();
            $scope.$digest();
        };

        $scope.subscribeManagement = function (serie) {
            if(serie.isSubscribe){
                subscribeService.unsubscribeToSerie(serie.id);
            }else{
                subscribeService.subscribeToSerie(serie.id);
            }
            // Revert subscription
            serie.isSubscribe = !serie.isSubscribe;
        };
    }
})();