'use strict';

describe('Filter: sexFilter', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var sexFilter;
  beforeEach(inject(function ($filter) {
    sexFilter = $filter('sexFilter');
  }));

  it('should return the input prefixed with "sexFilter filter:"', function () {
    var text = 'angularjs';
    expect(sexFilter(text)).toBe('sexFilter filter: ' + text);
  });

});
