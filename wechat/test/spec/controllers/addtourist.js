'use strict';

describe('Controller: AddtouristCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var AddtouristCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    AddtouristCtrl = $controller('AddtouristCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(AddtouristCtrl.awesomeThings.length).toBe(3);
  });
});
