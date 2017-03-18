'use strict';

describe('Controller: PaysuccessCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var PaysuccessCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PaysuccessCtrl = $controller('PaysuccessCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(PaysuccessCtrl.awesomeThings.length).toBe(3);
  });
});
