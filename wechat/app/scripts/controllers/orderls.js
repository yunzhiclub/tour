'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderlsCtrl
 * @description
 * # OrderlsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderlsCtrl', ['$scope', 'customer', function ($scope, customer) {
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      customer.getAllOrderByCustomerId(customerId, openId).then(function successCallBack(response) {
          console.log(response);
          $scope.orders = response;
      }, function errorCallBack() {

      });
  }]);
