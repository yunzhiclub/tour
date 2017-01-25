'use strict';

describe('Controller: VisaCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var VisaCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    VisaCtrl = $controller('VisaCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(VisaCtrl.awesomeThings.length).toBe(3);
  });
});
