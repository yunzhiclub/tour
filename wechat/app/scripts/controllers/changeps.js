'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ChangepsCtrl
 * @description
 * # ChangepsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ChangepsCtrl', ['$scope', 'customer', 'jssdk', function($scope, customer, jssdk) {

        // 性别的选项
        $scope.options = [
            { value: 1, sex: '男' },
            { value: 0, sex: '女' },
        ];

        // 保存数据
        $scope.submit = function() {
            customer.saveCustomer($scope.customer).then(function success() {
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
                    $scope.customer.headImg.headImgUrl= imgs.localId;
                    $scope.customer.headImg.serverId= imgs.serverId;                
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            } else if (type == 2) {
                jssdk.chooseImg(function(imgs) {
                    console.log(imgs);
                    $scope.customer.frontIdCardImg.frontIdCardImgUrl = imgs.localId; 
                    $scope.customer.frontIdCardImg.serverId= imgs.serverId;  
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            } else {
                jssdk.chooseImg(function(imgs) {
                    console.log(imgs);
                    $scope.customer.backIdCardImgUrl = imgs.localId;
                    $scope.customer.backIdCardImg.backIdCardImgUrl = imgs.localId; 
                    $scope.customer.backIdCardImg.serverId= imgs.serverId;     
                    // $scope.headImgUrl = imgs.localId;
                    // // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                });
            }
        }
    }]);
