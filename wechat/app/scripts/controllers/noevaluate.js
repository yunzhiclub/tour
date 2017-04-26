'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:NoevaluateCtrl
 * @description
 * # NoevaluateCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('NoevaluateCtrl',['$scope', 'customer', function ($scope, customer) {
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      customer.getUnEvaluateOrderByCustomerId(customerId, openId).then(function successCallBack(response) {
          console.log(response);
          $scope.orders = response;
          $scope.isPublic = 1;
      }, function errorCallBack() {

      });
  }]);
