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

            $scope.startCitys = [];
            $scope.selectedStartCityId = null;
            // 获取全部出发城市
            startcity.getStartCitys().then(function successCallBack(startCitys) {

                $scope.startCitys = startCitys;
                // 设默认城市
                $scope.selectedStartCityId = startCitys[0].id;
            }, function error() {});

            // 监听selectedStartCityId
            $scope.$watch('selectedStartCityId', function(newValue, oldValue) {
                order.startCityId = newValue;
            });
        }
    ]);