'use strict';

describe('Controller: OrderdetailCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var OrderdetailCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    OrderdetailCtrl = $controller('OrderdetailCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(OrderdetailCtrl.awesomeThings.length).toBe(3);
  });
});
