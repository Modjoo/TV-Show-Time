(function () {

    'use strict';

    angular.module('serialWatcherApp').controller('SignUpController', SignUpController);


    function SignUpController($location, $scope, $uibModal, $rootScope, authenticateService, signUpService) {

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
            user.birthday = moment(new Date()).format('YYYY-MM-DD');
            signUpService.signUp(user).then(function (result) {
                login(user).then(function(authUser){
                    $rootScope.$emit("UpdateUser", {
                        data: authUser
                    });
                });              
                $location.path('/');
            }, function (error) {
                $scope.modalData = {
                    title: "Error",
                    content: error.data
                };
                $scope.openModal(12);
            });
        };


        $scope.openModal = function (size) {

            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: '../views/modalContent.html',
                controller: 'ModalInstanceCtrl',
                size: size,
                resolve: {
                    items: function () {
                        return $scope.modalData;
                    }
                }
            });
        }
    }
})();


angular.module('serialWatcherApp').controller('ModalInstanceCtrl', function ($scope, $uibModalInstance, items) {

    $scope.items = items;
    $scope.selected = {
        item: $scope.items[0]
    };

    $scope.ok = function () {
        $uibModalInstance.close($scope.selected.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
});