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
        var format = function(items, length = 3) {
            var data = [];
            var datas = [];
            angular.forEach(items, function(value, key) {
                data.push(value);
                if (0 === ((key + 1) % length)) {
                    datas.push(data);
                    data = [];
                }
            });

            if (items.length % length !== 0) {
                datas.push(data);
            }
            return datas;
        };

        $scope.countrys = [];
        if ($stateParams.regionId !== undefined) {
        	destination.getCountrysByRegionId($stateParams.regionId).then(function successCallBack(response) {
        		$scope.countrys = format(response);
        	}, function errorCallBack(response) {

        	});
        };


    }]);
