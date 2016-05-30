(function () {
    'use strict';
    angular
        .module('authApp', ['ui.router', 'satellizer'])
        .directive('template', function(){
        return{
            templateUrl:'../template.html'
        };
    })
        .config(function ($stateProvider,$locationProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

        // Satellizer configuration that specifies which API
        // route the JWT should be retrieved from
        $authProvider.loginUrl = '/api/authenticate';

        // Redirect to the auth state if any other states
        // are requested other than users
        $urlRouterProvider.otherwise('/');

        $stateProvider
            .state('auth', {
            url: '/auth',
            templateUrl: '../views/authView.html',
            controller: 'AuthController as auth'
        })
            .state('calendar', {
            url: '/calendar',
            templateUrl: '../views/calendarView.html'
        })
            .state('users', {
            url: '/users',
            templateUrl: '../views/userView.html',
            controller: 'UserController as user'
        }).state('pouet', {
            url:'/pouet',
            controller: 'HomeController as home'
        })
            .state('index', {
            url: '/',
            templateUrl: '../views/homeView.html',
        });
            // use the HTML5 History API
            $locationProvider.html5Mode(true);



        function redirectWhenLoggedOut($q, $injector) {

            return {

                responseError: function (rejection) {

                    // Need to use $injector.get to bring in $state or else we get
                    // a circular dependency error
                    var $state = $injector.get('$state');

                    // Instead of checking for a status code of 400 which might be used
                    // for other reasons in Laravel, we check for the specific rejection
                    // reasons to tell us if we need to redirect to the login state
                    var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];

                    // Loop through each rejection reason and redirect to the login
                    // state if one is encountered
                    angular.forEach(rejectionReasons, function (value, key) {

                        if (rejection.data.error === value) {

                            // If we get a rejection corresponding to one of the reasons
                            // in our array, we know we need to authenticate the user so
                            // we can remove the current user from local storage
                            localStorage.removeItem('user');

                            // Send the user to the auth state so they can login
                            $state.go('auth');
                        }
                    });

                    return $q.reject(rejection);
                }
            }
        }

            function test(){
                alert("tamer");
            }

        // Setup for the $httpInterceptor
        $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

        // Push the new factory onto the $http interceptor array
        $httpProvider.interceptors.push('redirectWhenLoggedOut');

        $authProvider.loginUrl = '/api/authenticate';
    })
    /**
         * Load user from the rootScope
         */
        .run(function($rootScope, $state){
        // $stateChangeStart is fired whenever the state changes. We can use some parameters.
        $rootScope.$on('$stateChangeStart', function(event, toState){
            // Grab the user data from the local storage
            var user = JSON.parse(localStorage.getItem('user'));

            if(user){
                $rootScope.authenticated = true;
                $rootScope.currentUser = user;

                // If the user is logged in and we hit the auth route we don't need
                // to stay there and can send the user to the main state
                if(toState.name === "auth"){
                    event.preventDefault();

                    $state.go('users');
                }
            }
        });
    });
})();