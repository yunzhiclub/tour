'use strict';

describe('Controller: OrderlsCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var OrderlsCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    OrderlsCtrl = $controller('OrderlsCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(OrderlsCtrl.awesomeThings.length).toBe(3);
  });
});
