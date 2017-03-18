'use strict';

describe('Controller: PayfailCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var PayfailCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PayfailCtrl = $controller('PayfailCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(PayfailCtrl.awesomeThings.length).toBe(3);
  });
});
