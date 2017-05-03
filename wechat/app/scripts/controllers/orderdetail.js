'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderdetailCtrl
 * @description
 * # OrderdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderdetailCtrl', ['$scope', 'customer', '$stateParams', function ($scope, customer, $stateParams) {
      var orderId = $stateParams.orderId;
      var openId = $scope.customer.openid;
      customer.getOrderDetailById(orderId,openId).then(function successCallBack (response) {
          console.log(response);
          $scope.beds = response;
      },function errorCallBack() {

      })
  }]);
