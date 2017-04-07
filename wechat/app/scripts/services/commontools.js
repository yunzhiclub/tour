'use strict';

/**
 * @ngdoc service
 * @name wechatApp.commonTools
 * @description
 * # commonTools
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('commonTools', function() {
        // Service logic
        // 变成二维数组
        var formatArray = function(items, length = 3) {
            if (items === undefined) {
                return items;
            }
            var data = [];
            var datas = [];
            angular.forEach(items, function(value, key) {
                data.push(value);
                if (0 === ((key + 1) % length)) {
                    datas.push(data);
                    data = [];
                }
            });
            if (items.length % length !== 0) {
                datas.push(data);
            }

            return datas;
        };

        // Public API here
        return {
            formatArray: function(items, length = 3) {
                return formatArray(items, length);
            }
        };
    });
