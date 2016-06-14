/**
 * Main controller for modal.
 * Use the modalService for create and display some modal.
 */
angular.module('serialWatcherApp').controller('ModalController',ModalController);

/**
 * This is the main controller for all modal .
 * @param $scope
 * @param $uibModalInstance
 * @param items
 * @constructor
 */
function ModalController ($scope, $uibModalInstance, params) {

    $scope.params = params;
    $scope.selected = {
        params: $scope.params[0]
    };

    $scope.ok = function () {
        $uibModalInstance.close($scope.params.item);
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
};