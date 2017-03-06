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
                $scope.$apply();
            }, function error() {
                console.log('保存失败');
            });
        };

        // 选择上传图片获取localId(可用作url)和serverId
        $scope.chooseImg = function(type) {
            if (type == 1) {
                jssdk.chooseImg(function(imgs) {
                    console.log(imgs);
                    $scope.user.headImg.headImgUrl= imgs.localId;
                    $scope.user.headImg.serverId= imgs.serverId;                
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            } else if (type == 2) {
                jssdk.chooseImg(function(imgs) {
                    console.log(imgs);
                    $scope.user.frontIdCardImg.frontIdCardImgUrl = imgs.localId; 
                    $scope.user.frontIdCardImg.serverId= imgs.serverId;  
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            } else {
                jssdk.chooseImg(function(imgs) {
                    console.log(imgs);
                    $scope.user.backIdCardImgUrl = imgs.localId;
                    $scope.user.backIdCardImg.backIdCardImgUrl = imgs.localId; 
                    $scope.user.backIdCardImg.serverId= imgs.serverId;     
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            }
        }
    }]);
