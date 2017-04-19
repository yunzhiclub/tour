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
            var paramUrl = url + 'getChosenInvites';
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

        var getInvitationsByRegionId = function(regionId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getInvitationsByRegionId';
            var data = { id: regionId };


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
            var data = { id: countryId };


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

        var toPay = function(postData) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            var data = {
                customerId: postData.customerId,
                bedId: postData.bedId,
                invitationId: postData.invitationId,
            };
            var paramUrl = url + 'toPay';
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    // self.invitations = response.data.data;
                }
                deferred.resolve(response.data.data); //执行成功
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

        var getInvitationsByStartCityId = function(cityId) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var data = { cityId: cityId };
            var paramUrl = url + 'getInvitationsByStartCityId';

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

        var getPriceByStartTimeId = function(startTimeId) {

            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getPriceByStartTimeId';
            var data = { startTimeId: startTimeId };
            // $http去后台获取数据
            server.http(paramUrl, data, function successCallback(response) {
                var price = 0;
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    price = response.data.data;
                }
                deferred.resolve(price); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
           
            return promise;
        };

        var getInvitations = function() {
            return self.invitations;
        };

        var getAllInvitations = function () {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getAllInvitations';
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


        // Public API here
        return {
            // 获取精选趣约
            getChoosedInvitations: function() {
                return getChoosedInvitations();
            },

            // 按目的地(地区id)选出趣约
            getInvitationsByRegionId: function(regionId) {
                return getInvitationsByRegionId(regionId);
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
            toPay: function(postData) {
                return toPay(postData);
            },

            // 通过出发时间获取趣约
            getInvitationsByTime: function(time) {
                return getInvitationsByTime(time);
            },

            // 按出发城市id选出趣约
            getInvitationsByStartCityId: function(cityId) {
                return getInvitationsByStartCityId(cityId);
            },

            // 获取趣约详情by趣约id
            getInvitationById: function(id) {
                return getInvitationById(id);
            },

            // 获取价格通过出发时间id
            getPriceByStartTimeId: function(startTimeId) {
                return getPriceByStartTimeId(startTimeId);
            },

            // 获取请求回来的邀约
            getInvitations: function() {
                return getInvitations();
            },

            // 获取全部邀约
            getAllInvitations:function () {
                return getAllInvitations();
            },
        };
    }]);
