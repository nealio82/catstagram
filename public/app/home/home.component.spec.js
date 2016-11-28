'use strict';

describe('home', function() {

    // Load the module that contains the `home` component before each test
    beforeEach(module('home'));

    // Test the controller
    describe('HomeController', function() {

        it('should create a `home` model with a `SHOW ME THE KITTIES` button', inject(function($componentController) {
            var ctrl = $componentController('home');

            expect(ctrl.button.text).toBe('SHOW ME THE KITTIES');
        }));

    });

});
