'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HomeCtrl
 * @description
 * # 首页的控制器
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('HomeCtrl', ['$scope', 'destination', function ($scope, destination) {

  	// 获取首页的citys
  	destination.getHomeCitys().then(function successCallBack(homeCitys) {
  		$scope.homeCitys = homeCitys;
  	}, function errorCallBack() {

  	});

  	// 获取首页的地区
  	destination.getHomeRegions().then(function successCallBack(homeRegions) {
  		$scope.homeRegions = homeRegions;
  	}, function errorCallBack() {

  	});
  }]);
