'use strict';

describe('Service: cookies', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var cookies;
  beforeEach(inject(function (_cookies_) {
    cookies = _cookies_;
  }));

  it('should do something', function () {
    expect(!!cookies).toBe(true);
  });

});
