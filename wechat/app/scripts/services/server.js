'use strict';

/**
 * @ngdoc service
 * @name wechatApp.server
 * @description
 * # server
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('server', ['$http', 'config', function($http, config) {

        var url = config.apiUrl;

        // 设置header
        var http = function(paramUrl, data, successCallBack, errorCallBack) {

            var param = {};
            if (typeof(paramUrl) === 'string') {
                param.method = 'GET';
                param.params = data;
                param.url = url + paramUrl;
            } else {
                param = paramUrl;
            }
            $http(param).then(function successCallback(response) {
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                }
                successCallBack(response);
            }, function errorCallback(response) {
                console.log(response);
                errorCallBack(response);

            });
        };
        // Public API here
        return {
            http: function(paramUrl, data, successCallBack, errorCallBack) {
                return http(paramUrl, data, successCallBack, errorCallBack);
            }
        };
    }]);
