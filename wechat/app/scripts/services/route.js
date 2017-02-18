'use strict';

/**
 * @ngdoc service
 * @name wechatApp.route
 * @description
 * # route
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('route', ['$q', '$http', 'config', '$httpParamSerializer', function($q, $http, config, $httpParamSerializer) {
        // Service logic
        var self = this;
        self.routes = [];
        var getChosedRoutes = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getChosedRoutes',
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };


        var getRoutesBycountryid = function(countryid, cityid) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getRoutesBycountryid',
                params: { countryid: countryid, cityid: cityid },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };


        var getRouteByid = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getRouteByid',
                params: { id: id },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getStartimeByid = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getStartimeByid',
                params: { id: id },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getEvaluatesByid = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getEvaluatesByid',
                params: { id: id },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var collecteTheRoute = function(user_id, route_id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            
            
            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/collecteTheRoute',
                params: {user_id: user_id, route_id: route_id},
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };


        // Public API here
        return {
            // 获取推荐路线
            getChosedRoutes: function() {
                return getChosedRoutes();
            },

            // 取得对应id的route详情
            getRouteByid: function(id) {
                return getRouteByid(id);
            },

            // 取得对应id的route对应的所有出发时间和价格
            getStartimeByid: function(id) {
                return getStartimeByid(id);
            },

            // 按目的地(国家id)和出发城市id选出路线
            getRoutesBycountryid: function(countryid, cityid) {
                return getRoutesBycountryid(countryid, cityid);
            },

            // 取得对应id的route对应的所有评价
            getEvaluatesByid: function(id) {
                return getEvaluatesByid(id);
            },

            collecteTheRoute: function(user_id, route_id) {
                return collecteTheRoute(user_id, route_id);
            },
            
        };
    }]);
