'use strict';

angular.module('kittyList').component('kittyList', {
    templateUrl: '/app/kitty-list/kitty-list.template.html',
    controller: function KittyListController($http) {

        var self = this;

        self.uploadKittyInfo = function uploadKittyInfo(imagePath, index) {
            $http.post('/api/upload', {
                'filename': imagePath
            }).then(function(response) {
                alert(response.data.uri);
            });
        }

        self.getKitties = function getKitties() {
            $http.get('/api/list').then(function(response) {
                self.kitties = response.data;

                console.log(self.kitties);
            });
        };

        self.getKitties();

    }
});
