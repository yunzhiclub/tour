'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:NopayedCtrl
 * @description
 * # NopayedCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('NopayedCtrl', ['$scope', 'customer','jssdk', function ($scope, customer, jssdk) {
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      customer.getUnPayOrderByCustomerId(customerId, openId).then(function successCallBack(response) {
          console.log(response);
          $scope.orders = response;
      }, function errorCallBack() {
      });
      $scope.topay = function (data) {
          data.openid = openId;
          // 去支付
          jssdk.getPayParams(data, 2).then(function successCallBack(response) {
              console.log(response);
              // 调用微信支付接口去支付
              jssdk.toPay(response);
          }, function errorCallBack() {

          });
      }
  }]);
