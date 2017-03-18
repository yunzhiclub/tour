'use strict';

describe('Controller: Tuisong2Ctrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var Tuisong2Ctrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    Tuisong2Ctrl = $controller('Tuisong2Ctrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(Tuisong2Ctrl.awesomeThings.length).toBe(3);
  });
});
