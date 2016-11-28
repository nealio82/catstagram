'use strict';

angular.
module('catstagramApp').
config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.
        when('/', {
            template: '<home></home>'
        }).
        when('/kitties', {
            template: '<kitty-list></kitty-list>'
        }).
        otherwise('/');
    }
]);
