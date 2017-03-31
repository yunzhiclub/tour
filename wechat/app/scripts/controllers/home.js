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
                    if (value.invite_deadline === 0) {
                        value.type = 1;
                    }
                    value.invite_deadline = value.invite_deadline - 1;
                });
            $timeout(change, 1000);
        };

        change();
        // 为获取来的图片URL加上前缀
        $scope.urlPrefix = config.siteUrl + 'public/upload/';
        // 获取首页的citys
        destination.getHomeCitys().then(function successCallBack(homeCountrys) {
            $scope.homeCountrys = homeCountrys;
        }, function errorCallBack() {

        });

        // 获取首页的地区
        destination.getHomeRegions().then(function successCallBack(homeRegions) {
            $scope.homeRegions = homeRegions;
        }, function errorCallBack() {

        });

        // 获取精选邀约
        $scope.getChoosedInvitations = function() {
            invitation.getChoosedInvitations().then(function successCallBack(response) {
                angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.invite_deadline = (value.invite_deadline - new Date().getTime()) / 1000;
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;
            }, function errorCallBack() {});
        };

        // 以目的国家id获取的邀约
        $scope.getInvitationsByCountryId = function(countryId) {
            invitation.getInvitationsByCountryId(countryId).then(function successCallBack(response) {
                $scope.invitations = response;
            }, function errorCallBack() {});
        };

        // 以目的地区id获取的邀约
        $scope.getInvitationsByPlaceId = function(placeId) {
            invitation.getInvitationsByPlaceId(placeId).then(function successCallBack(response) {
                $scope.invitations = response;
            }, function errorCallBack() {});
        }

    }]);
