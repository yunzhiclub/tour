'use strict';

/**
 * @ngdoc service
 * @name wechatApp.destination
 * @description
 * # destination
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('destination', ['$q', '$http', 'config', function($q, $http, config) {
        // Service logic
        var self = this;
        self.destinations = [];
        var getAllRegions = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Destination/getAllRegions',
            }).then(function successCallback(response) {
                // console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getCountrysByplaceid = function(placeid) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Destination/getCountrysByplaceid',
                params: {placeid: placeid},
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getCitysByCountryId = function(countryid) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Destination/getCitysByCountryId',
                params: {countryid: countryid},
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
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
            getCountrysByPlaceId: function(placeid) {
                return getCountrysByPlaceId(placeid);
            },

            // 获取国家所在的城市
            getCitysByCountryId: function(countryid) {
                return getCitysByCountryId(countryid);
            },
        };
    }]);
