'use strict';

describe('Service: commonTools', function () {

  // load the service's module
  beforeEach(module('wechatApp'));

  // instantiate service
  var commonTools;
  beforeEach(inject(function (_commonTools_) {
    commonTools = _commonTools_;
  }));

  it('should do something', function () {
    expect(!!commonTools).toBe(true);
  });

});
