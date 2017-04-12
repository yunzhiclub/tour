'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:IvdetailCtrl
 * @description
 * # IvdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('IvdetailCtrl', ['$scope', 'invitation', '$stateParams', 'commonTools', 'config',  '$state', function($scope, invitation, $stateParams, commonTools, config, $state) {

        // 应邀的对象实体
        var index = $stateParams.invitationIndex;
        $scope.index = index;
        var invitations = invitation.getInvitations();
        var invitation = invitations[index];
        var getAge = function(birthday) {
            if (birthday !== null) {
                // 变为字符串属性
                var num = birthday;
                var birthdayString = num.toString();

                // 获取年月日
                var year = Number(birthdayString.substr(0, 4));
                var month = Number(birthdayString.substr(4, 2));
                var day = Number(birthdayString.substr(6, 2));

                var today = new Date();
                var age = today.getFullYear() - year;
                if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                    age--;
                }
                return age;
            }
            return -1;
        };

        var getOldType = function(old) {
            if (0 <= old && old <= 25) {
                return 1;
            } else if (25 < old && old <= 35) {
                return 2;
            } else if (35 < old) {
                return 3;
            } else {
                return -1;
            }
        }
        console.log($scope.customer);
        // 判断该邀约是否有资格选择 有资格isQualified 为1 否则为 0
        angular.forEach(invitation.beds, function(bed) {
        	// 给oldType赋默认值
        	var oldType = -1;

        	// 获取用户的年龄
            var age = getAge($scope.customer.birthday);

            // 获取用户年龄类别
            if (age !== -1) {
            		oldType = getOldType(age);
            } 
            if (bed.sex === $scope.customer.sex && bed.old === oldType) {
                bed.isQualified = 1; 
            } else {
                bed.isQualified = 1; // 为了测试先都允许选择房间
            }
        });
        // 为获取来的图片URL加上前缀
        $scope.urlPrefix = config.siteUrl + 'public/upload/';

        // 求人均的价格
        $scope.perMoney = Math.ceil(invitation.totalMoney / 6);
        invitation.beds = commonTools.formatArray(invitation.beds, 2);
        console.log(invitation);
        $scope.invitation = invitation;
    }]);
