'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ToinviteCtrl
 * @description
 * # ToinviteCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('ToinviteCtrl', ['starcity', 'invitation', '$scope',  function (starcity, $scope, invitation) {
  	// 获取全部出发城市
   starcity.getStartCitys().then(function successCallBack(starcitys) {
   	$scope.starcitys = starcitys;
   	// 设默认城市
   	$scope.selectedStartCityId = starcitys[0].id;
   }, function error() {
   });
   console.log(invitation);
  }]);
