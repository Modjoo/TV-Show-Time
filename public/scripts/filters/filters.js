angular.module('serialWatcherApp')
    .filter('formatDate', function() {
    return function(date, format) {
        return moment(new Date(date)).format(format);
    }
});