'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:PaysuccessCtrl
 * @description
 * # PaysuccessCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('PaysuccessCtrl', ['$scope', '$timeout', '$state', '$stateParams', function ($scope, $timeout, $state,$stateParams) {
     // 路由穿过来的订单号
      var number = $stateParams.number;
      $scope.number = number;
      // 绑定５秒的值
      $scope.clock = 5;
      var reduceOneSecond = function () {
          $scope.clock = $scope.clock -1;
          if ($scope.clock === 0) {
              $state.go('orderls', {number:number});
          } else {
              $timeout(reduceOneSecond, 1000);
          }
      }
      reduceOneSecond();
  }]);
