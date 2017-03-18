'use strict';

describe('Controller: HourseCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var HourseCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    HourseCtrl = $controller('HourseCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(HourseCtrl.awesomeThings.length).toBe(3);
  });
});
