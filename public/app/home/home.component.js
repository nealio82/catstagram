'use strict';

angular.module('home').component('home', {
    templateUrl: '/app/home/home.template.html',
    controller: function HomeController($location) {

        var self = this;

        this.button = {
            'text': 'SHOW ME THE KITTIES'
        }

        self.gotoKitties = function gotoKitties() {
            $location.path("/kitties");
        };

    }
});
