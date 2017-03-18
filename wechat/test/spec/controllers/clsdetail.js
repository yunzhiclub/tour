'use strict';

describe('Controller: ClsdetailCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var ClsdetailCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ClsdetailCtrl = $controller('ClsdetailCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ClsdetailCtrl.awesomeThings.length).toBe(3);
  });
});
