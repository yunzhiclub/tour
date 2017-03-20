'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ChoserouteCtrl
 * @description
 * # ChoserouteCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ChoserouteCtrl', ['$scope', 'order', 'destination', function($scope, order, destination) {
        $scope.regions = [];
        destination.getAllRegions().then(function successCallBack(response) {
        	console.log(response);
            $scope.regions = response;
        }, function errorCallBack(response) {
        	console.log(response);
        });
    }]);
