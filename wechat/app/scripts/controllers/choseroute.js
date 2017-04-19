'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ChoserouteCtrl
 * @description
 * # ChoserouteCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ChoserouteCtrl', ['$scope', 'order', 'destination', 'commonTools',  function($scope, order, destination, commonTools) {
        
        // 数据加载过程中隐藏邀约页面
        $scope.loading = true;

        // 为找到数据时显示数据未找到界面
        $scope.isEmpty = true;

        $scope.regions = [];
        destination.getAllRegions().then(function successCallBack(response) {
        	console.log(response);
        	// 变为二维数组
            $scope.regions = commonTools.formatArray(response, 4);
            // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
            if (response.length > 0) {
                $scope.isEmpty = false;
            } else {
                $scope.isEmpty = true;
            }

            // 数据加载完成
            $scope.loading = false;
        }, function errorCallBack(response) {
        	console.log(response);
        });
    }]);
