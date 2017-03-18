'use strict';

describe('Service: jssdk', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var jssdk;
  beforeEach(inject(function (_jssdk_) {
    jssdk = _jssdk_;
  }));

  it('should do something', function () {
    expect(!!jssdk).toBe(true);
  });

});
