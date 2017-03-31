'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:payedMoney
 * @function
 * @description
 * # payedMoney
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
    .filter('payedMoney', function() {

        // 求已经支付的金额
        return function(beds) {
            var payedmoney = 0;
            angular.forEach(beds, function(bed) {
                if (bed.customer_id !== null) {
                    payedmoney += bed.money;
                }
            });
            return payedmoney;
        };

    });
