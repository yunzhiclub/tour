'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderdetailCtrl
 * @description
 * # OrderdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderdetailCtrl', ['$scope', 'customer', '$stateParams', 'commonTools', function ($scope, customer, $stateParams, commonTools) {
      var orderId = $stateParams.orderId;
      var openId = $scope.customer.openid;
      customer.getOrderDetailById(orderId,openId).then(function successCallBack (response) {
          $scope.beds = commonTools.formatArray(response, 2);
          console.log($scope.beds);
      },function errorCallBack() {

      })
  }]);
