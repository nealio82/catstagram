'use strict';

describe('kittyList', function() {

    // Load the module that contains the `kittyList` component before each test
    beforeEach(module('kittyList'));

    // Test the controller
    describe('KittyListController', function() {
        var $httpBackend, ctrl;
        var kittyData = [{
            path: 'images/example.jpg'
        }];

        var pastebinResponse = 'http://example.com/some_uri';

        beforeEach(inject(function($componentController, _$httpBackend_) {
            $httpBackend = _$httpBackend_;
            $httpBackend.expectGET('/api/list').respond(kittyData);
            $httpBackend.whenPOST('/api/upload').respond(pastebinResponse);

            ctrl = $componentController('kittyList');
        }));

        it('should fetch the kitty list from /api/list', function() {
            expect(ctrl.kitties).toBeUndefined();

            $httpBackend.flush();
            expect(ctrl.kitties).toEqual(kittyData);
        });

        it('should post to /api/upload', function() {

            expect(ctrl.pastes.length).toBe(0);
            ctrl.uploadKittyInfo('images/example.jpg');

            $httpBackend.flush();
            expect(ctrl.pastes.length).toBe(1);
        });

    });

});
