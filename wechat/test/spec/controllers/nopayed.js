'use strict';

describe('Controller: NopayedCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var NopayedCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    NopayedCtrl = $controller('NopayedCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(NopayedCtrl.awesomeThings.length).toBe(3);
  });
});
