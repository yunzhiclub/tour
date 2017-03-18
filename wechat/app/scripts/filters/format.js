'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:format
 * @function
 * @description
 * # format
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
    .filter('format', function() {
        return function(iterm) {
            var result = '';
            if(iterm === 1) {
                result = '男';
                return result;
            }

            if(iterm === 0) {
                result = '女';
                return result;
            }
            return result;
        };
    });
