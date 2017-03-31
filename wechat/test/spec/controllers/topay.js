'use strict';

describe('Controller: TopayCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var TopayCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    TopayCtrl = $controller('TopayCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(TopayCtrl.awesomeThings.length).toBe(3);
  });
});
