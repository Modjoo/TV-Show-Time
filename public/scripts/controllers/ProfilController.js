(function () {

    'use strict';

    angular
        .module('serialWatcherApp')
        .controller('ProfilController', ProfilController);


    function ProfilController($location, $scope, $filter, profileService) {
        profileService.getProfile().then(function(result){
            var user = result.user;
            console.log(user.birthday);
            user.birthday = new Date(2013, 9, 22);
            //$filter('date')(user.birthday, "dd.MM.yyyy");
            $scope.user = user;
        });

        
    }
})();