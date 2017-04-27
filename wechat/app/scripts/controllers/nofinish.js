'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:NofinishCtrl
 * @description
 * # NofinishCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('NofinishCtrl', ['$scope','customer',function ($scope, customer) {
      var customerId = $scope.customer.id;
      var openId = $scope.customer.openid;
      customer.getUnSetOutOrderByCustomerId(customerId , openId).then(function successCallBack(response){
          console.log(response);
          $scope.orders = response;
          $scope.isPublic = 1;
      },function errorCallBack() {

      });
  }]);
