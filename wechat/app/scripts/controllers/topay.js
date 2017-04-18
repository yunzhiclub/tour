'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:TopayCtrl
 * @description
 * # TopayCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('TopayCtrl', ['$scope', 'config', 'invitation', '$stateParams', '$state', function($scope, config, invitation, $stateParams, $state) {
        var bedIdIndex = $stateParams.bedIdIndex;

        // 邀约数组的索引
        var index = bedIdIndex.index;
        // 选中床位的id
        var bedId = bedIdIndex.bedId;
        // 选中床位的钱数
        var money = bedIdIndex.money;

        // 用factory传过来当前的邀约
        var invitations = invitation.getInvitations();
        var invitation = invitations[index];
        $scope.invitation = invitation;

        // 绑定钱和床位id
        $scope.money = money;
        $scope.bedId = bedId;
        // 预定时间
        $scope.orderTime = new Date();

        // 为获取来的图片URL加上前缀
        $scope.urlPrefix = config.siteUrl + 'public/upload/';
        console.log(invitation);

        // 去支付并跳转到支付成功页面
        $scope.paysubmit = function() {
        	var postData = {
        		customerId: $scope.customer.id,
        		bedId: bedId,
        		invitationId: invitation.id,
        	};

        	// 去支付
        	invitation.topay(postData);
            // 调到支付成功页面
            $state.go('paysuccess');
        };
    }]);
