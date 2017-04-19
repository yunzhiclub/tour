'use strict';

/**
 * @ngdoc service
 * @name wechatApp.starcity
 * @description
 * # starcity
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('startcity', ['$q', 'server', function($q, server) {
        // Service logic
        var self = this;
        self.citys = [];
        var url = 'City/';
        var getStartCity = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getStartCity';
            var data = null;

            server.http(paramUrl, data, function successCallback(response) {
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.sitys = response.data.data;
                }
                deferred.resolve(self.sitys); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            }); 
          
            return promise;
        };



        // Public API here
        return {
            // 获取全部出发城市
            getStartCity: function() {
                return getStartCity();
            }
        };
    }]);
