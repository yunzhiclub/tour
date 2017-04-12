'use strict';

describe('Filter: hhmmss', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var hhmmss;
  beforeEach(inject(function ($filter) {
    hhmmss = $filter('hhmmss');
  }));

  it('should return the input prefixed with "hhmmss filter:"', function () {
    var text = 'angularjs';
    expect(hhmmss(text)).toBe('hhmmss filter: ' + text);
  });

});
