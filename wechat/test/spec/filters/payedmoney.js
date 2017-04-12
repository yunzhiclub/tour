'use strict';

describe('Filter: payedMoney', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var payedMoney;
  beforeEach(inject(function ($filter) {
    payedMoney = $filter('payedMoney');
  }));

  it('should return the input prefixed with "payedMoney filter:"', function () {
    var text = 'angularjs';
    expect(payedMoney(text)).toBe('payedMoney filter: ' + text);
  });

});
