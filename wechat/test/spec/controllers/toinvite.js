'use strict';

describe('Controller: ToinviteCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ToinviteCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ToinviteCtrl = $controller('ToinviteCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    // expect(ToinviteCtrl.awesomeThings.length).toBe(3);
  });
});
