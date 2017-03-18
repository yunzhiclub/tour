'use strict';

describe('Service: startcity', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var startcity;
  beforeEach(inject(function (_startcity_) {
    startcity = _startcity_;
  }));

  it('should do something', function () {
    expect(!!startcity).toBe(true);
  });

});
