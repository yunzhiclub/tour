'use strict';

describe('Filter: format', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var format;
  beforeEach(inject(function ($filter) {
    format = $filter('format');
  }));

  it('should return the input prefixed with "format filter:"', function () {
    var datas = [1,2,3,4,5,6,7,8,9];
    var formatDatas = format(datas);
    expect(formatDatas.length).toBe(3);

  });

});
