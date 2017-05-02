'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:NopayedCtrl
 * @description
 * # NopayedCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('NopayedCtrl', ['$scope', 'customer', function ($scope, customer) {
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      customer.getUnPayOrderByCustomerId(customerId, openId).then(function successCallBack(response) {
          console.log(response);
          $scope.orders = response;
          $scope.isPublic = 1;
      }, function errorCallBack() {

      });
  }]);
