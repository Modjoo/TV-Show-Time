angular.module('serialWatcherApp')
    .directive('ngConfirmClick', [
        function () {
            return {
                link: function (scope, element, attr) {
                    var msg = attr.ngConfirmClick|| "Default message : please add attribute message";
                    var clickAction = attr.confirmedClick;
                    element.bind('click', function (event) {
                        if (window.confirm(msg)) {
                            scope.$eval(clickAction)
                        }
                    });
                }
            };
        }])
    .directive('navBar', function () {
        return {
            templateUrl: '../views/nav/navBar.html'
        };
    });