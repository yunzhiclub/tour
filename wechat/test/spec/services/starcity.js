'use strict';

describe('Service: starcity', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var starcity;
  beforeEach(inject(function (_starcity_) {
    starcity = _starcity_;
  }));

  it('should do something', function () {
    expect(!!starcity).toBe(true);
  });

});
