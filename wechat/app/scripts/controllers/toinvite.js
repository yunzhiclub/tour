'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ToinviteCtrl
 * @description
 * # ToinviteCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ToinviteCtrl', ['startcity', '$scope', 'order',
        function(startcity, $scope, order) {

            $scope.startCity = [];
            $scope.selectedStartCityId = null;
            // 获取全部出发城市
            startcity.getStartCity().then(function successCallBack(startCity) {

                $scope.startCity = startCity;
                // 设默认城市
                $scope.selectedStartCityId = startCity[0].id;
            }, function error() {});

            // 监听selectedStartCityId 并给邀约的单例的邀约startCityId赋值
            $scope.$watch('selectedStartCityId', function(newValue, oldValue) {
                order.startCityId = newValue;
            });
        }
    ]);