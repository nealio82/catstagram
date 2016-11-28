'use strict';

describe('kittyList', function() {

    // Load the module that contains the `kittyList` component before each test
    beforeEach(module('kittyList'));

    // Test the controller
    describe('KittyListController', function() {

        it('should create a `kittyList` model with a `SHOW ME THE KITTIES` button', inject(function($componentController) {
            var ctrl = $componentController('kittyList');

            expect(ctrl.button.text).toBe('SHOW ME THE KITTIES');
        }));

    });

});
