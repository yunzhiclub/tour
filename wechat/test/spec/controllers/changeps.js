'use strict';

describe('Controller: ChangepsCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ChangepsCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ChangepsCtrl = $controller('ChangepsCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ChangepsCtrl.awesomeThings.length).toBe(3);
  });
});
