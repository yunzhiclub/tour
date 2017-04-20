'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:CollectionlsCtrl
 * @description`
 * # CollectionlsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('CollectionlsCtrl', ['$scope', 'customer', function ($scope, customer) {
  		var customerId = $scope.customer.id;
  		var openid = $scope.customer.openid;
  		customer.getCollectionsByCustomer_id(customerId, openid).then(function successCallBack(response) {
  			$scope.collections = response;
  		}, function errorCallBack() {

  		});
  }]);
