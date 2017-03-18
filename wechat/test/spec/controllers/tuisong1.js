'use strict';

describe('Controller: Tuisong1Ctrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var Tuisong1Ctrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    Tuisong1Ctrl = $controller('Tuisong1Ctrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(Tuisong1Ctrl.awesomeThings.length).toBe(3);
  });
});
