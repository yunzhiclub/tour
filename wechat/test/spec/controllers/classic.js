'use strict';

describe('Controller: ClassicCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ClassicCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ClassicCtrl = $controller('ClassicCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ClassicCtrl.awesomeThings.length).toBe(3);
  });
});
