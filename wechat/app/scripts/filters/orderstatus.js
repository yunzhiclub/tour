'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:orderstatus
 * @function
 * @description
 * # orderstatus
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
  .filter('orderstatus', function () {
      return function (status) {
          var result = "未支付";
          if(status === 1){
              result = "未成团";
          }
          if(status === 2){
              result = "未评价";
          }
          if(status === 3){
              result = "已评价";
          }
          return result;
      };
  });
