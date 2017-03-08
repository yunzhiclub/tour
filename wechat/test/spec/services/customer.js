'use strict';

describe('Service: customer', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var customer;
  beforeEach(inject(function (_customer_) {
    customer = _customer_;
  }));

  it('should do something', function () {
    expect(!!customer).toBe(true);
  });

});
