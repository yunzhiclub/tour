'use strict';

describe('Controller: ChoserouteCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ChoserouteCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ChoserouteCtrl = $controller('ChoserouteCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ChoserouteCtrl.awesomeThings.length).toBe(3);
  });
});
