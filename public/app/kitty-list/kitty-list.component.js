'use strict';

angular.module('kittyList').component('kittyList', {
    templateUrl: '/app/kitty-list/kitty-list.template.html',
    controller: function KittyListController($http) {

        var self = this;
        self.pastes = [];

        self.uploadKittyInfo = function uploadKittyInfo(imagePath) {
            $http.post('/api/upload', {
                'filename': imagePath
            }).then(function successCallback(response) {

                self.pastes.push({
                    'response': 'success',
                    'url': response.data.uri
                });
            
            }, function errorCallback(response) {
                
                self.pastes.push({
                    'response': 'error',
                    'message': response.data.message
                });
                
            });
        }

        self.getKitties = function getKitties() {
            $http.get('/api/list').then(function (response) {
                
                self.kitties = response.data;
                
            });
        };

        self.getKitties();

    }
});
