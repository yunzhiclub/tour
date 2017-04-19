'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:InvitedlsCtrl
 * @description
 * # InvitedlsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('InvitedlsCtrl', ['$scope', 'startcity', 'destination', 'invitation', 'config', function ($scope, startcity, destination, invitation, config) {

        // 数据加载过程中隐藏邀约页面
        $scope.loading = true;

        // 为找到数据时显示数据未找到界面
        $scope.isEmpty = true;

  		// 获取全部出发城市
    	$scope.getStartCitys = function() {
    		startcity.getStartCitys().then(function successCallBack(response) {
    			$scope.startCitys = response;
    		}, function errorCallBack(){

    		});
    	};

    	// 获取按出发城市为筛选条件的邀约
    	$scope.getInvitationsByStartCityId = function(cityId) {
            // 开始加载数据
            $scope.loading = true;
    		invitation.getInvitationsByStartCityId(cityId).then(function successCallBack(response) {
    			 angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.invite_deadline = Math.floor((value.invite_deadline - new Date().getTime()) / 1000);
                     // 如果有路线对应的出发时间id证明选用出发时间表中的日期并给路线默认出发时间赋值
                     if (value.start_time_id === 0) {
                         value.route_start_time = value.start_time_date;
                     }
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;
                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
                console.log(response);
    		}, function errorCallBack(){

    		});
    	};

    	// 获取全部目的地国家
    	$scope.getDestinationCountrys = function() {
    		destination.getDestinationCountrys().then(function successCallBack(response) {
    			$scope.destinationCountrys = response;
    			console.log(response);
    		}, function errorCallBack(){

    		});
    	};

    	// 获取按目的地国家为筛选条件的邀约
    	$scope.getInvitationsByCountryId = function(countryId) {
            // 开始加载数据
            $scope.loading = true;
    		invitation.getInvitationsByCountryId(countryId).then(function successCallBack(response) {
    			 angular.forEach(response, function(value) {
                    // 计算离截止时间的秒数
                    value.invite_deadline = Math.floor((value.invite_deadline - new Date().getTime()) / 1000);
                     // 如果有路线对应的出发时间id证明选用出发时间表中的日期并给路线默认出发时间赋值
                     if (value.start_time_id === 0) {
                         value.route_start_time = value.start_time_date;
                     }
                    // 加上是否下架的标识 1 是下架默认是 0
                    value.type = 0;
                });
                $scope.invitations = response;
                // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
                if (response.length > 0) {
                    $scope.isEmpty = false;
                } else {
                    $scope.isEmpty = true;
                }

                // 数据加载完成
                $scope.loading = false;
                console.log(response);
    		}, function errorCallBack(){

    		});
    	};

      // 定义按排序的字段变量 默认是总价格 和升序还是降序变量 默认是降序
	  $scope.sortField = 'totalMoney';
	  // totalMoney的排序变量
      $scope.isAscended1 = false;
      // route_begin_time的排序变量
	  $scope.isAscended2 = false;
	  // 定义改变排列字段是总价,并反转排序
	  $scope.changeSortTypeToTotalMoney = function () {
          $scope.sortField = 'totalMoney';
          if ($scope.isAscended1 === false) {
              $scope.isAscended1 = true;
		  } else {
              $scope.isAscended1 = false;
		  }
      };
      // 定义改变排列字段是出发时间,并反转排序
      $scope.changeSortTypeToRouteBeginTime = function () {
          $scope.sortField = 'route_begin_time';
          if ($scope.isAscended2 === false) {
              $scope.isAscended2 = true;
          } else {
              $scope.isAscended2 = false;
          }
      };
      // 获取全部邀约
      var getAllInvitations = function () {
          // 开始加载数据
          $scope.loading = true;
          invitation.getAllInvitations().then(function successCallBack(response) {
              angular.forEach(response, function(value) {
                  // 计算离截止时间的秒数
                  value.invite_deadline = Math.floor((value.invite_deadline - new Date().getTime()) / 1000);
                  // 如果有路线对应的出发时间id证明选用出发时间表中的日期并给路线默认出发时间赋值
                  if (value.start_time_id === 0) {
                      value.route_start_time = value.start_time_date;
                  }
                  // 加上是否下架的标识 1 是下架默认是 0
                  value.type = 0;
              });
              $scope.invitations = response;
              // 判断是否获取邀约信息,用来判断是否显示未获取到数据的页面
              if (response.length > 0) {
                  $scope.isEmpty = false;
              } else {
                  $scope.isEmpty = true;
              }

              // 数据加载完成
              $scope.loading = false;
              console.log(response);
          }, function errorCallBack(){
          });
      };

      // 执行获取全部邀约的方法
      getAllInvitations();
  }]);
