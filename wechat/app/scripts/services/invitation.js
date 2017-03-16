'use strict';

/**
 * @ngdoc service
 * @name wechatApp.invitation
 * @description
 * # invitation
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('invitation', ['config', '$q', 'server', function(config, $q, server) {
        // Service logic
        var self = this;
        self.invitations = [];
        
        var url = 'Invitation/';
        var getChoosedInvitations = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getChoosedInvitations';
            var data = null;


            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getInvitationsByPlaceId = function(placeId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getInvitationsByPlaceId';
            var data = { placeId: placeId };


            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getInvitationsByCountryId = function(countryId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getInvitationsByCountryId';
            var data = { countryId: countryId };


            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var saveTheInvitation = function(postdata) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var data = {data: postdata};
            var paramUrl = url + 'saveInvitation';
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    //self.invitations = response.data.data;
                }
                deferred.resolve(response.status); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var topay = function(postdata) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            var data = {
                user_id: postdata.user_id,
                invite_id: postdata.invite_id,
                bed_id: postdata.bed_id,
            };
            var paramUrl = url + 'topay';
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getInvitationsByTime = function(time) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var data = { time: time };
            var paramUrl = url + 'getInvitationsByTime';

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
            return promise;
        };

        var getInvitationsByCityId = function(cityId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var data = { cityId: cityId };
            var paramUrl = url + 'getInvitationsByCityId';

            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var getInvitationById = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getInvitationById';
            var data = { id: id };
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.invitations = response.data.data;
                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
           
            return promise;
        };






        // Public API here
        return {
            // 获取精选趣约
            getChoosedInvitations: function() {
                return getChoosedInvitations();
            },

            // 按目的地(地区id)选出趣约
            getInvitationsByPlaceId: function(placeId) {
                return getInvitationsByPlaceId(placeId);
            },
            // 按目的地(国家id)选出趣约
            getInvitationsByCountryId: function(countryId) {
                return getInvitationsByCountryId(countryId);
            },

            // 保存趣约
            saveTheInvitation: function(postdata) {
                return saveTheInvitation(postdata);
            },

            // 支付
            topay: function(postdata) {
                return topay(postdata);
            },

            // 通过出发时间获取趣约
            getInvitationsByTime: function(time) {
                return getInvitationsByTime(time);
            },

            // 按出发城市id选出趣约
            getInvitationsByCityId: function(cityId) {
                return getInvitationsByCityId(cityId);
            },

            // 获取趣约详情by趣约id
            getInvitationById: function(id) {
                return getInvitationById(id);
            },
        };
    }]);
