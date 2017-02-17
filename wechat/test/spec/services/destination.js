'use strict';

describe('Service: destination', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var destination;
  beforeEach(inject(function (_destination_) {
    destination = _destination_;
  }));

  it('should do something', function () {
    expect(!!destination).toBe(true);
  });

});
