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
  		customer.getCollectionsByCustomer_id(customerId).then(function successCallBack(response) {
  			$scope.collections = response;
  		}, function errorCallBack() {

  		});
  }]);
