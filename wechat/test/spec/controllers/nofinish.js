'use strict';

describe('Controller: NofinishCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var NofinishCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    NofinishCtrl = $controller('NofinishCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(NofinishCtrl.awesomeThings.length).toBe(3);
  });
});
