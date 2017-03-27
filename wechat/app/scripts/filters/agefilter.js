'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:ageFilter
 * @function
 * @description
 * # ageFilter
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
  .filter('ageFilter', function () {
    return function (input) {
      return 'ageFilter filter: ' + input;
    };
  });
