'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HomeCtrl
 * @description
 * # 首页的控制器
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HomeCtrl', ['$scope', 'destination', 'invitation', function($scope, destination, invitation) {

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
