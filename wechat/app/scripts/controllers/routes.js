'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:RoutesCtrl
 * @description
 * # RoutesCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('RoutesCtrl', ['$scope', '$stateParams', 'route', 'order', function ($scope, $stateParams, route, order) {
  
    	// destinationCountryId 目的城市id startCityId出发城市id
    	var startCityId = order.startCityId;
    	if ($stateParams.destinationCountryId !== undefined) {
        	route.getRoutesByCountryId($stateParams.destinationCountryId, startCityId).then(function successCallBack(response) {
        		
        	}, function errorCallBack(response) {

        	});
        }
  }]);
