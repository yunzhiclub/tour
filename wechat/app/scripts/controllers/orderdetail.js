'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:OrderdetailCtrl
 * @description
 * # OrderdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('OrderdetailCtrl', ['$scope', 'customer', '$stateParams', 'commonTools', 'jssdk', '$location', function ($scope, customer, $stateParams, commonTools, jssdk, $location) {
      var orderId = $stateParams.orderId;
      var openId = $scope.customer.openid;
      customer.getOrderDetailById(orderId,openId).then(function successCallBack (response) {
          $scope.beds = commonTools.formatArray(response.beds, 2);
          $scope.inviteId = response.inviteId;
      },function errorCallBack() {

      });
      $scope.shareLinkToFriend = function () {
          // 生成的链接
          var link = $location.protocol() + '://' + $location.host() + ':' +  $location.port() + '/#!/ivdetail/' + orderId;
          jssdk.shareLinkToFriend(link);
      }
  }]);
