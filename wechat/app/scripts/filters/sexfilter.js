'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:sexFilter
 * @function
 * @description
 * # sexFilter
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
  .filter('sexFilter', function () {
    return function (sex) {
    	var result = "男";
    	if (sex === 0) {
    		result = '女';
    	}
      return result;
    };
  });
