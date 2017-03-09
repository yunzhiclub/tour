'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:PlacelistCtrl
 * @description
 * # PlacelistCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('PlacelistCtrl', ['$scope', '$stateParams', 'destination', function($scope, $stateParams, destination) {
       
        $scope.countrys = [];
        if ($stateParams.regionId !== undefined) {
        	destination.getCountrysByRegionId($stateParams.regionId).then(function successCallBack(response) {
        		console.log(response);
        		$scope.countrys = response;
        	}, function errorCallBack(response) {

        	});
        }
    }]);
