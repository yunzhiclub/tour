'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ChangepsCtrl
 * @description
 * # ChangepsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ChangepsCtrl', ['$scope', 'user', 'jssdk', function($scope, user, jssdk) {

        // 性别的选项
        $scope.options = [
            { value: 1, sex: '男' },
            { value: 0, sex: '女' },
        ];

        // 保存数据
        $scope.submit = function() {
            user.saveUser($scope.user).then(function success() {
                console.log('保存成功');
            }, function error() {
                console.log('保存失败');
            });
        };

        // 上传的头像url
        $scope.headImgUrl = null;

        // 上传图片
        $scope.chooseImg = function() {
            jssdk.chooseImg(function(res) {
                $scope.headImgUrl = res.localIds[0];
                // $scope.$apply();
                var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
            });
        }
    }]);
