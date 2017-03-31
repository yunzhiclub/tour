'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:IvdetailCtrl
 * @description
 * # IvdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('IvdetailCtrl', ['$scope', 'invitation', '$stateParams', function ($scope, invitation, $stateParams){
  	// 应邀的对象实体
   	var index = $stateParams.invitationIndex;
   	var invitations = invitation.getInvitations();
   	var invitation = invitations[index];
  }]);
