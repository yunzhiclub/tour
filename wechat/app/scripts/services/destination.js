'use strict';

/**
 * @ngdoc service
 * @name wechatApp.destination
 * @description
 * # destination
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('destination', ['$q', 'config', 'server', function($q, config, server) {
        // Service logic

        var url = 'Destination/';
        var self = this;
        self.destinations = [];
        var getAllRegions = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getAllRegions';
            var data = null;
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                // console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败   
            });
            return promise;
        };

        var getCountrysByRegionId = function(regionId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getCountrysByRegionId';
            var data = { id: regionId };
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                // console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败   
            });

            return promise;
        };

        var getCitysByCountryId = function(countryId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getCitysByCountryId';
            var data = { countryId: countryId };
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                // console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败   
            });
            return promise;
        };

        // 获取首页显示的目的城市
        var getHomeCitys = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getHomeCitys';
            var data = null;

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
            return promise;
        };

        // 获取首页显示的目的地区
        var getHomeRegions = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            var paramUrl = url + 'getHomeRegions';
            var data = null;

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
            return promise;
        };

        // 获取感兴趣的目的地
        var getInterstedDestinations = function(customerId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            var paramUrl = url + 'getInterstedDestinations';
            var data = {customerId: customerId};

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
            return promise;
        };

        // Public API here
        return {
            // 获取全部目的地(地区)
            getAllRegions: function() {
                return getAllRegions();
            },

            // 获取地区所有的国家
            getCountrysByRegionId: function(regionId) {
                return getCountrysByRegionId(regionId);
            },

            // 获取国家所在的城市
            getCitysByCountryId: function(countryId) {
                return getCitysByCountryId(countryId);
            },

            // 获取首页显示的目的城市（4）
            getHomeCitys: function() {
                return getHomeCitys();
            },


            // 获取首页显示的目的地区
            getHomeRegions: function() {
                return getHomeRegions();
            },

            // 获取感兴趣的目的地
            getInterstedDestinations: function(customerId) {
                return getInterstedDestinations(customerId);
            },
        };
    }]);
