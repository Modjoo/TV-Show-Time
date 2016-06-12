angular.module('serialWatcherApp')
    // Allows to form a date.
    .filter('formatDate', function () {
        return function (date, format) {
            return moment(new Date(date)).format(format);
        }
    });