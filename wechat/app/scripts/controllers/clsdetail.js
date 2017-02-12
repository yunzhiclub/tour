'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ClsdetailCtrl
 * @description
 * # ClsdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('ClsdetailCtrl', function ($scope) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    
    $scope.status1 = true;
    $scope.status2 = false;

    $scope.ishidden1 = function() {
    	$scope.status1 = false;
    	$scope.status2 = true;
    };
    $scope.ishidden2 = function() {
    	
    	$scope.status1 = true;
    	$scope.status2 = false;
    };
  });
