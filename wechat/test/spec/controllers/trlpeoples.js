'use strict';

describe('Controller: TrlpeoplesCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var TrlpeoplesCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    TrlpeoplesCtrl = $controller('TrlpeoplesCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(TrlpeoplesCtrl.awesomeThings.length).toBe(3);
  });
});
