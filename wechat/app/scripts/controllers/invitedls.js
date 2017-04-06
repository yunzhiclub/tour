'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:InvitedlsCtrl
 * @description
 * # InvitedlsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('InvitedlsCtrl', ['$scope', 'startcity', 'destination', 'invitation', function ($scope, startcity, destination, invitation) {
    	// 获取全部出发城市
    	$scope.getStartCitys = function() {
    		startcity.getStartCitys().then(function successCallBack(response) {
    			$scope.startCitys = response;
    		}, function errorCallBack(){

    		});
    	};

    	// 获取按出发城市为筛选条件的邀约
    	$scope.getInvitationsByStartCityId = function(cityId) {
    		invitation.getInvitationsByStartCityId(cityId).then(function successCallBack(response) {
    			 angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.invite_deadline = Math.floor((value.invite_deadline - new Date().getTime()) / 1000);
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;
                console.log(response);
    		}, function errorCallBack(){

    		});
    	};
  }]);
