'use strict';

/**
 * @ngdoc service
 * @name wechatApp.route
 * @description
 * # route
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('route', ['$q', '$http', 'config', function($q, $http, config) {
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
            return response;
        };

        var getRoutesByplaceid = function(placeid) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Route/getRoutesByplaceid',
                params: { placeid: placeid },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.routes= response.data.data;
                }
                deferred.resolve(self.routes); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return response;
        };

        var meaningOfLife = 42;

        // Public API here
        return {
            // 获取推荐路线
            getChosedRoutes: function() {
              return getChosedRoutes();
            },

            // 按目的地选出路线
            getRoutesByplaceid: function(placeid) {
              return getRoutesByplaceid(placeid);
            }
        };
    }]);
