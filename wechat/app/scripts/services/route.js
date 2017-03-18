'use strict';

/**
 * @ngdoc service
 * @name wechatApp.route
 * @description
 * # route
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('route', ['$q', 'config', 'server', function($q, config, server) {
        // Service logic
        var self = this;
        self.routes = [{id:1,startCityName: '天津', content:'这是路线的详细的描述', beginTime: 69870990, actualPrice:5677, deadLine:234343234}, {id:2, startCityName: '天津',content: '这是路线的详细的描述', beginTime: 69870990, actualPrice:5677,deadLine:234343234}];
        var url = 'Route/';
        var getChoosedRoutes = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getChoosedRoutes';
            var data = null;

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };


        var getRoutesByCountryId = function(countryId, cityId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getRoutesByCountryId';
            var data = { countryid: countryId, cityid: cityId };

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };


        var getRouteById = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getRouteById';
            var data = { id: id };

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getStarTimeByid = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getStarTimeByid';
            var data = { id: id };

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getEvaluatesById = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getEvaluatesById';
            var data = { id: id };

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var collecteTheRoute = function(customerId, routeId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'collecteTheRoute';
            var data = { customerId: customerId, routeId: routeId };

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes = response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };


        // Public API here
        return {
            // 获取推荐路线
            getChoosedRoutes: function() {
                return getChoosedRoutes();
            },

            // 取得对应id的route详情
            getRouteById: function(id) {
                return getRouteById(id);
            },

            // 取得对应id的route对应的所有出发时间和价格
            getStarTimeByid: function(id) {
                return getStarTimeByid(id);
            },

            // 按目的地(国家id)和出发城市id选出路线
            getRoutesByCountryId: function(countryId, cityId) {
                return getRoutesByCountryId(countryId, cityId);
            },

            // 取得对应id的route对应的所有评价
            getEvaluatesById: function(id) {
                return getEvaluatesById(id);
            },

            collecteTheRoute: function(customerId, routeId) {
                return collecteTheRoute(customerId, routeId);
            },
            routes: self.routes,
        };
    }]);
