'use strict';

describe('Controller: CollectionlsCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var CollectionlsCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    CollectionlsCtrl = $controller('CollectionlsCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(CollectionlsCtrl.awesomeThings.length).toBe(3);
  });
});
