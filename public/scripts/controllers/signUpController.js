(function () {

    'use strict';

    /**
     * This controller allows you to add new users.
     */
    angular.module('serialWatcherApp').controller('SignUpController', SignUpController);


    function SignUpController($location, $scope, $rootScope, authenticateService,modalService, signUpService) {

        $scope.user = {};
        $scope.maxDate = moment(new Date()).format('YYYY-MM-DD');


        var login = function (user) {
            var credentials = {
                pseudo: user.pseudo,
                password: user.password
            };
            return authenticateService.authenticate(credentials);
        };

        $scope.submitForm = function () {
            var user = angular.merge({}, $scope.user);

            // Convert the date for the database.
            user.birthday = moment(new Date()).format('YYYY-MM-DD');
            signUpService.signUp(user).then(function (result) {
                login(user).then(function(authUser){
                    $rootScope.$emit("UpdateUser", {
                        data: authUser
                    });
                });              
                $location.path('/');
            }, function (error) {
                modalService.openDialogModal("Error", error.data);
            });
        };
    }
})();
