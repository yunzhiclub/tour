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
        
        // 数据加载过程中隐藏邀约页面
        $scope.loading = true;

        // 为找到数据时显示数据未找到界面
        $scope.isEmpty = false;

    	// destinationCountryId 目的城市id startCityId出发城市id
    	var startCityId = order.startCityId;
    	if ($stateParams.destinationCountryId !== undefined) {
        	route.getRoutesByCountryId($stateParams.destinationCountryId, startCityId).then(function successCallBack(response) {
        		$scope.routes = response;
                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
        	}, function errorCallBack(response) {
        		console.log(response);
        	});
        }
  }]);
