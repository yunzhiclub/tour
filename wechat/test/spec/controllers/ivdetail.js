'use strict';

describe('Controller: IvdetailCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var IvdetailCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    IvdetailCtrl = $controller('IvdetailCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(IvdetailCtrl.awesomeThings.length).toBe(3);
  });
});
