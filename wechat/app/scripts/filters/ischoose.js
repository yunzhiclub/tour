'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:ischoose
 * @function
 * @description
 * # ischoose
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
  .filter('ischoose', function () {
    return function (status) {
        var result = "已有应邀人";
        if(status === undefined){
            result = "可应邀";
        }
        return result;
    };
  });
