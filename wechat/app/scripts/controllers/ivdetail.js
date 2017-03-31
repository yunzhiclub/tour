'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:IvdetailCtrl
 * @description
 * # IvdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('IvdetailCtrl', ['$scope', 'invitation', '$stateParams', 'commonTools', 'config', function ($scope, invitation, $stateParams, commonTools, config){
  	// 应邀的对象实体
   	var index = $stateParams.invitationIndex;
   	var invitations = invitation.getInvitations();
   	var invitation = invitations[index];
   	
   	// 为获取来的图片URL加上前缀
       $scope.urlPrefix = config.siteUrl + 'public/upload/';

   	// 求人均的价格
   	$scope.perMoney = Math.ceil(invitation.totalMoney/6);
   	invitation.beds = commonTools.formatArray(invitation.beds, 2);
   	console.log(invitation);
   	$scope.invitation = invitation;

  }]);
