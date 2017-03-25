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
            // 对应路线的出发时间测试数据
            var dataArray = [{
                id: 1,
                date: 214323432,
                money: 5999
            }, {
                id: 2,
                date: 214323432,
                money: 5999
            }, {
                id: 3,
                date: 214323432,
                money: 5999
            }, {
                id: 4,
                date: 214323432,
                money: 5999
            }, {
                id: 5,
                date: 214323432,
                money: 5999
            }, {
                id: 6,
                date: 214323432,
                money: 5999
            }, {
                id: 7,
                date: 214323432,
                money: 5999
            }, {
                id: 8,
                date: 214323432,
                money: 5999
            }];
            $scope.startTimes = commonTools.formatArray(dataArray, 4);



            // 根据路由传过来的数组索引获取路线详细信息
            var index = $stateParams.routeId;
            var routeDetail = route.routes[index];
        
            // 提取路线的出发城市名字和路线id和详细内容描述和默认出发时间和默认价格
            $scope.startCityName = routeDetail.startCityName;
            $scope.content = routeDetail.content;
            $scope.beginTime = routeDetail.beginTime;
            $scope.actualPrice = routeDetail.actualPrice;

            var routeId = routeDetail.id;

            // 向这次的邀约中添加路线的id
            order.routeId = routeId;
            order.deadLine = routeDetail.deadLine;

            // 借用order传入选择房间的c层
            order.defaultPrice = routeDetail.actualPrice;
            // 获取路线对应的出发时间和价格
            // route.getStarTimeByid(routeId).then(function successCallBack(response) {
            //   console.log(response);
            //   $scope.startTimes = commonTools.formatArray(response, 4);
            // }, function errorCallBack(response) {
            //   console.log(response);
            // });


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