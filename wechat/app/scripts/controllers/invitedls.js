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
    			console.log(response);
    		}, function errorCallBack(){

    		});
    	};
  }]);
