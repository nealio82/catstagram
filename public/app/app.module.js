'use strict';

// Define the `catstgramApp` module
angular.module('catstagramApp', [
    // ...which depends on the `home` module
    'ngRoute',
    // 'core',
    'home',
    'kittyList'
]);