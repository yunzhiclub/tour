'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:PlacelistCtrl
 * @description
 * # PlacelistCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('PlacelistCtrl', ['$scope', '$stateParams', 'destination', 'commonTools',
        function($scope, $stateParams, destination, commonTools) {
            $scope.countrys = [];

            // 数据加载过程中隐藏邀约页面
            $scope.loading = true;

            // 为找到数据时显示数据未找到界面
            $scope.isEmpty = true;

            if ($stateParams.regionId !== undefined) {
                $scope.loading = true;
                destination.getCountrysByRegionId($stateParams.regionId).then(function successCallBack(response) {
                    // console.log(response);
                    // 把获取到的国家数组变成二维数组
                    $scope.countrys = commonTools.formatArray(response);
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
            }
        }
    ]);