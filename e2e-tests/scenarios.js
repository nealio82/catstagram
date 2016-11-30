'use strict';

// Angular E2E Testing Guide:
// https://docs.angularjs.org/guide/e2e-testing

describe('Catstagram App', function () {

    describe('View: Home', function () {

        beforeEach(function () {
            browser.get('/');
        });

        it('should create a clickable `SHOW ME THE KITTIES` button', function () {

            var button = element(by.id('kittybutton'));

            expect(button.getText()).toBe('SHOW ME THE KITTIES');

            button.click();

            expect(browser.getLocationAbsUrl()).toBe('/kitties')

        });

    });

    describe('View: Kitty list', function () {

        beforeEach(function () {
            browser.get('/#!/kitties');
        });

        it('should show a list of kitty images', function () {

            var kittyList = element.all(by.repeater('kitty in $ctrl.kitties'));

            expect(kittyList.count()).toBeGreaterThan(0);

        });

        it('should have an empty messages list by default', function () {

            var pastesList = element.all(by.repeater('paste in $ctrl.pastes'));

            expect(pastesList.count()).toBe(0);
        });

        it('should post kitty info to pastebin', function () {

            var pastesList = element.all(by.repeater('paste in $ctrl.pastes'));
            expect(pastesList.count()).toBe(0);

            var buttons = element.all(by.css('.btn.btn-primary'));
            buttons.first().click();

            expect(pastesList.count()).toBe(1);

        });

    });


});
