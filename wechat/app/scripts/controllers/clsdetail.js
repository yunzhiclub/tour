'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ClsdetailCtrl
 * @description
 * # ClsdetailCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('ClsdetailCtrl', ['$scope', '$stateParams', 'route', 'order', 'commonTools',
        function($scope, $stateParams, route, order, commonTools) {
            // route m层传值   
            var routes = route.getRoutes();

            // 根据路由传过来的数组索引获取路线详细信息
            var index = $stateParams.routeId;
            var routeDetail = routes[index];
          
            // 提取路线的出发城市名字和路线id和详细内容描述和默认出发时间和默认价格
            $scope.startCityName = routeDetail.route.start_city_name;
            $scope.content = routeDetail.route.route_description;
            $scope.beginTime = routeDetail.route.start_time;
            $scope.actualPrice = routeDetail.route.actual_price;

            var routeId = routeDetail.route.id;

            // 向这次的邀约中添加路线的id和默认截止日期
            order.routeId = routeId;
            order.deadLine = routeDetail.route.route_deadline;

            // 借用order把默认价格传入选择房间的c层
            order.defaultPrice = routeDetail.route.actual_price;

            // 获取路线对应的出发时间和价格
            route.getStarTimeByid(routeId).then(function successCallBack(response) {
                console.log(response);
              $scope.startTimes = commonTools.formatArray(response, 4);
            }, function errorCallBack(response) {
              console.log(response);
            });


            // 获取路线的评价


            // 拼接订单详情


            // 收藏这条路线


            // 客服电话去掉拨号功能


            // 设置显示和隐藏
            $scope.status1 = true;
            $scope.status2 = false;

            $scope.ishidden1 = function() {
                $scope.status1 = false;
                $scope.status2 = true;
            };
            $scope.ishidden2 = function() {

                $scope.status1 = true;
                $scope.status2 = false;
            };
        }
    ]);