'use strict';

describe('Filter: ischoose', function () {

  // load the filter's module
  beforeEach(module('wechatApp'));

  // initialize a new instance of the filter before each test
  var ischoose;
  beforeEach(inject(function ($filter) {
    ischoose = $filter('ischoose');
  }));

  it('should return the input prefixed with "ischoose filter:"', function () {
    var text = 'angularjs';
    expect(ischoose(text)).toBe('ischoose filter: ' + text);
  });

});
