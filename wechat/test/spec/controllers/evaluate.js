'use strict';

describe('Controller: EvaluateCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var EvaluateCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    EvaluateCtrl = $controller('EvaluateCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(EvaluateCtrl.awesomeThings.length).toBe(3);
  });
});
