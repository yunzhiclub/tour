'use strict';

describe('Controller: SendtimeCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var SendtimeCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    SendtimeCtrl = $controller('SendtimeCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(SendtimeCtrl.awesomeThings.length).toBe(3);
  });
});
