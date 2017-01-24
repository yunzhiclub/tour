'use strict';

describe('Controller: PaydetailCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var PaydetailCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PaydetailCtrl = $controller('PaydetailCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(PaydetailCtrl.awesomeThings.length).toBe(3);
  });
});
