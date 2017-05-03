'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderdetailCtrl
 * @description
 * # OrderdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderdetailCtrl', ['$scope', 'customer', function ($scope, customer) {
      var orderId = $scope.order.id;
      customer.getOrderDetailById(orderId).then(function successCallBack (response) {
          console.log(response);
          $scope.order = response;
      },function errorCallBack() {

      })
  }]);
