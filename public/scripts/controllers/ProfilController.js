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
    function ProfilController($location, $scope, $filter, profileService) {
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
            profileService.setProfile(sendUser).then(function (r) {
                localStorage.setItem("user", JSON.stringify(sendUser));
            }, function (error) {
                console.error("error when update profile ");
            });
        }
    }
})();