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
    .filter('ageFilter', function() {
        // birthday number example 19821109
        return function(birthday) {
            if (birthday !== null) {
                // 变为字符串属性
                var num = birthday;
                var birthdayString = num.toString();

                // 获取年月日
                var year = Number(birthdayString.substr(0, 4));
                var month = Number(birthdayString.substr(4, 2));
                var day = Number(birthdayString.substr(6, 2));

                var today = new Date();
                var age = today.getFullYear() - year;
                if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                    age--;
                }
                return age;
            }
            return  ' ' ;
        };
    });
