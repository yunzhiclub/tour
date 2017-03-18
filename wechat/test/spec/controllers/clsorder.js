'use strict';

describe('Controller: ClsorderCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ClsorderCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ClsorderCtrl = $controller('ClsorderCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ClsorderCtrl.awesomeThings.length).toBe(3);
  });
});
