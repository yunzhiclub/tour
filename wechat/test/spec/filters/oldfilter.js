'use strict';

describe('Filter: oldFilter', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var oldFilter;
  beforeEach(inject(function ($filter) {
    oldFilter = $filter('oldFilter');
  }));

  it('should return the input prefixed with "oldFilter filter:"', function () {
    var text = 'angularjs';
    expect(oldFilter(text)).toBe('oldFilter filter: ' + text);
  });

});
