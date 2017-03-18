'use strict';

describe('Controller: TuisongCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var TuisongCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    TuisongCtrl = $controller('TuisongCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(TuisongCtrl.awesomeThings.length).toBe(3);
  });
});
