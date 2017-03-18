'use strict';

describe('Service: room', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var room;
  beforeEach(inject(function (_room_) {
    room = _room_;
  }));

  it('should do something', function () {
    expect(!!room).toBe(true);
  });

});
