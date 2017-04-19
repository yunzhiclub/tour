'use strict';

describe('Filter: savemaxmoney', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var savemaxmoney;
  beforeEach(inject(function ($filter) {
    savemaxmoney = $filter('savemaxmoney');
  }));

  it('should return the input prefixed with "savemaxmoney filter:"', function () {
    var text = 'angularjs';
    expect(savemaxmoney(text)).toBe('savemaxmoney filter: ' + text);
  });

});
