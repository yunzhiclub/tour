'use strict';

describe('Filter: minvalue', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var minvalue;
  beforeEach(inject(function ($filter) {
    minvalue = $filter('minvalue');
  }));

  it('should return the input prefixed with "minvalue filter:"', function () {
    var text = 'angularjs';
    expect(minvalue(text)).toBe('minvalue filter: ' + text);
  });

});
