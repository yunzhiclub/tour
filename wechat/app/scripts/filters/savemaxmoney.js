'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:savemaxmoney
 * @function
 * @description
 * # savemaxmoney
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
  .filter('savemaxmoney', function () {
      // 求一个数组中的最小值
        return function(invitation) {
            var minValue = 10000000;
            angular.forEach(invitation.beds, function(value) {
                if (value.money < minValue) {
                    minValue = value.money;
                }
            });
            // 求最多可省
            minValue = invitation.totalMoney / 6 - minValue
            return minValue;
        };
  });
