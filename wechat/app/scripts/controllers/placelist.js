'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:PlacelistCtrl
 * @description
 * # PlacelistCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('PlacelistCtrl', ['$scope', '$stateParams', 'destination', 'commonTools', function($scope, $stateParams, destination, commonTools) {
       
        $scope.countrys = [];
        if ($stateParams.regionId !== undefined) {
        	destination.getCountrysByRegionId($stateParams.regionId).then(function successCallBack(response) {
        		
        		$scope.countrys = commonTools.formatArray(response);
                
        	}, function errorCallBack(response) {
                console.log(response);
        	});
        }
    }]);
