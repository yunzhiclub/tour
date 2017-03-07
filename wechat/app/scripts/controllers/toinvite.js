'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ToinviteCtrl
 * @description
 * # ToinviteCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('ToinviteCtrl', ['startcity', '$scope', 'invitation', function (startcity, $scope, invitation) {
  	// 获取全部出发城市
   startcity.getStartCitys().then(function successCallBack(startCitys) {
   	$scope.startCitys = startCitys;
   	// 设默认城市
   	$scope.selectedStartCityId = startCitys[0].id;
   }, function error() {
   });

  }]);
