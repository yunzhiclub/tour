'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:oldFilter
 * @function
 * @description
 * # oldFilter
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
	.filter('oldFilter', function() {
		return function(iterm) {
			var result = ' ';
			if (iterm === 1) {
				result = '0~~25';
				return result;
			}

			if (iterm === 2) {
				result = '25~~35';
				return result;
			}
			if (iterm === 3) {
				result = '35~~>>';
				return result;
			}
			return result;
		};
	});