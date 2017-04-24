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

            // 根据路由传过来的routeId获取具体路线
            var routeId = $stateParams.routeId;
            $scope.routeId = routeId;
           
            route.getRouteById(routeId).then(function successCallBack(response) {
                
                // 提取路线的出发城市名字和路线id和详细内容描述和默认出发时间和默认价格
                $scope.startCityName = response[0].route.start_city_name;
                $scope.content = response[0].route.route_description;
                $scope.startTime = response[0].route.start_time * 1000;
                $scope.actualPrice = response[0].route.actual_price;
                

                // 借用order把默认价格和默认价格传入选择房间的c层
                order.defaultPrice = response[0].route.actual_price;
                order.deadLine = response[0].route.route_deadline;
                // 先默认按默认出发时间
                order.setOutTime = response[0].route.start_time;
                // 存入天数
                order.days = response[0].route.route_days;
            }, function errorCallBack() {

            });

            // 向这次的邀约中添加路线的id和默认截止日期
            order.routeId = routeId;
            

            

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
            $scope.collecteTheRoute = function () {
                var customerId = $scope.customer.id;
                var route_Id = routeId;
                route.collecteTheRoute(customerId, route_Id);
            };

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