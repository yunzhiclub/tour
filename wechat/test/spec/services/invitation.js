'use strict';

describe('Service: invitation', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var invitation;
  beforeEach(inject(function (_invitation_) {
    invitation = _invitation_;
  }));

  it('should do something', function () {
    expect(!!invitation).toBe(true);
  });

});
