'use strict';

describe('Controller: AddinvoiceCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var AddinvoiceCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    AddinvoiceCtrl = $controller('AddinvoiceCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(AddinvoiceCtrl.awesomeThings.length).toBe(3);
  });
});
