'use strict';

describe('Controller: TouristlsCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var TouristlsCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    TouristlsCtrl = $controller('TouristlsCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(TouristlsCtrl.awesomeThings.length).toBe(3);
  });
});
