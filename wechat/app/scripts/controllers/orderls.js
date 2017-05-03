'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderlsCtrl
 * @description
 * # OrderlsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderlsCtrl', ['$scope', 'customer','$stateParams','jssdk', function ($scope, customer,$stateParams,jssdk) {
      // 看路由是否传过来订单号，如果传过来证明是支付后要查看支付订单情况，　
      // 所以请求的方法也就不一样了
      var number = $stateParams.number;
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      if (number === '') {
          customer.getAllOrderByCustomerId(customerId, openId).then(function successCallBack(response) {
              console.log(response);
              $scope.orders = response;
          }, function errorCallBack() {

          });
      } else {
          jssdk.queryOrder(number).then(function successCallBack(response) {
                console.log(response);
              $scope.orders = response;
          }, function errorCallBack(response) {

          });
      }
      $scope.stateChanged = function (isPublic, orderNumber) {
          console.log(isPublic);
          console.log(orderNumber);
          console.log(openId);
          customer.setIsPublic(isPublic, orderNumber, openId);
      }
  }]);
