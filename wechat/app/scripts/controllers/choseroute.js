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
        $scope.regions = [];
        destination.getAllRegions().then(function successCallBack(response) {
        	console.log(response);
        	// 变为二维数组
            $scope.regions = commonTools.formatArray(response, 4);
        }, function errorCallBack(response) {
        	console.log(response);
        });
    }]);
