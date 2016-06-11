(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('ProfilController', ProfilController);


    function ProfilController($location, $scope, $filter, profileService) {
        profileService.getProfile().then(function(result){
            var user = result.user;
            user.birthday = new Date(user.birthday);
            $scope.user = user;
        });

        $scope.update = function(user){
            var sendUser = angular.merge({}, user);
            sendUser.birthday = $filter('date')(user.birthday, 'yyyy-MM-dd');
            console.log("send data : ", sendUser);
            profileService.setProfile(sendUser).then(function(r){
                console.log(r);
            });
        }
    }
})();