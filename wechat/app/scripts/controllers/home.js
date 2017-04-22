'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HomeCtrl
 * @description
 * # 首页的控制器
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HomeCtrl', ['$scope', 'destination', 'invitation', 'config',  '$timeout', function($scope, destination, invitation, config, $timeout) {
        $scope.invitations = [];

        // 时间一秒减一
         var change = function() {
            angular.forEach($scope.invitations, function(value) {
                    // 离截止时间的秒数减一
                    if (value.deadline === 0) {
                        value.type = 1;
                    }
                    value.deadline = value.deadline - 1;
                });
            $timeout(change, 1000);
        };

        change();

        // 数据加载过程中隐藏邀约页面
        $scope.loading = true;

        // 为找到数据时显示数据未找到界面
        $scope.isEmpty = true;


        // 获取首页的citys
        destination.getHomeCity().then(function successCallBack(homeCountry) {
            $scope.homeCountry = homeCountry;
        }, function errorCallBack() {

        });
        console.log(destination.getHomeRegions().then(function successCallBack(homeRegions) {
            $scope.homeRegions = homeRegions;
        }, function errorCallBack() {

        }));
        // 获取首页的地区
        destination.getHomeRegions().then(function successCallBack(homeRegions) {
            $scope.homeRegions = homeRegions;
        }, function errorCallBack() {

        });

        // 获取精选邀约
        var getChoosedInvitations = function() {
            // 开始加载数据
            $scope.loading = true;
            invitation.getChoosedInvitations().then(function successCallBack(response) {
                angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.deadline = Math.floor(value.deadline - new Date().getTime() / 1000);
                    // 修改php与js时间戳的不一致
                    value.set_out_time = value.set_out_time * 1000;
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;

                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
            }, function errorCallBack() {});
        };
        $scope.getChoosedInvitations = function () {
            getChoosedInvitations();
        }
        // 以目的国家id获取的邀约
        $scope.getInvitationsByCountryId = function(countryId) {
            // 开始加载数据
            $scope.loading = true;
            invitation.getInvitationsByCountryId(countryId).then(function successCallBack(response) {
               angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.deadline = Math.floor(value.deadline - new Date().getTime() / 1000);
                    // 修改php与js时间戳的不一致
                    value.set_out_time = value.set_out_time * 1000;
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;

                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
            }, function errorCallBack() {});
        };

        // 以目的地区id获取的邀约
        $scope.getInvitationsByRegionId = function(regionId) {
            // 开始加载数据
            $scope.loading = true;
            invitation.getInvitationsByRegionId(regionId).then(function successCallBack(response) {
                angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数并向下取整
                    value.deadline = Math.floor(value.deadline - new Date().getTime() / 1000);
                    // 修改php与js时间戳的不一致
                    value.set_out_time = value.set_out_time * 1000;
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;
                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
            }, function errorCallBack() {
            });
        }
        // 默认进首页时显示精选邀约
        getChoosedInvitations();
    }]);
