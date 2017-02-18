'use strict';

/**
 * @ngdoc service
 * @name wechatApp.invitation
 * @description
 * # invitation
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('invitation', ['config', '$http', '$q', function(config, $http, $q) {
        // Service logic
        var self = this;
        self.invitations = [];
        var getChosedInvitations = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getChosedInvitations',
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getInvitationsByplaceid = function(placeid) {
           // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            
            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getInvitationsByplaceid',
                params: {placeid: placeid},
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getInvitationsBycountryid = function(countryid) {
           // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            
            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getInvitationsBycountryid',
                params: {countryid: countryid},
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };
        
        // Public API here
        return {
            // 获取精选趣约
            getChosedInvitations: function() {
              return getChosedInvitations();
            },

            // 按目的地(地区id)选出趣约
            getInvitationsByplaceid: function(placeid) {
              return getInvitationsByplaceid(placeid);
            },
            // 按目的地(国家id)选出趣约
            getInvitationsBycountryid: function(countryid) {
              return getInvitationsBycountryid(countryid);
            },
        };
    }]);
