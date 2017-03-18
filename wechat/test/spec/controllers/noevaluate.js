'use strict';

describe('Controller: NoevaluateCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var NoevaluateCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    NoevaluateCtrl = $controller('NoevaluateCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(NoevaluateCtrl.awesomeThings.length).toBe(3);
  });
});
