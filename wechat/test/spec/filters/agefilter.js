'use strict';

describe('Filter: ageFilter', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var ageFilter;
  beforeEach(inject(function ($filter) {
    ageFilter = $filter('ageFilter');
  }));

  it('should return the input prefixed with "ageFilter filter:"', function () {
    var text = 20160326;
    expect(ageFilter(text)).toBe('ageFilter filter: ' + 1);
  });

});
