'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:hhmmss
 * @function
 * @description
 * # hhmmss
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
    .filter('hhmmss', function() {
        return function(time) {
            var sec_num = parseInt(time, 10); // don't forget the second param
            var hours = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours < 10) { hours = "0" + hours; }
            if (minutes < 10) { minutes = "0" + minutes; }
            if (seconds < 10) { seconds = "0" + seconds; }
            var time = hours + ':' + minutes + ':' + seconds;
            return time;
        };
    });
