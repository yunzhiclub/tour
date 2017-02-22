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
                params: { placeid: placeid },
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
                params: { countryid: countryid },
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

        var saveTheInvitation = function(postdata) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // 需要保存得数据(示例数据)
            var datas = {
                user_id: postdata.user_id,
                route_id: postdata.route_id,
                time_id: postdata.time_id,
                isopen: postdata.isopen,
                beds: {
                    bed1: {
                        sex: postdata.beds.bed1.sex,
                        old: postdata.beds.bed1.old,
                        money: postdata.beds.bed1.money,
                    },
                    bed2: {
                        sex: postdata.beds.bed2.sex,
                        old: postdata.beds.bed2.old,
                        money: postdata.beds.bed2.money,
                    },
                    bed3: {
                        sex: postdata.beds.bed3.sex,
                        old: postdata.beds.bed3.old,
                        money: postdata.beds.bed3.money,
                    },
                    bed4: {
                        sex: postdata.beds.bed4.sex,
                        old: postdata.beds.bed4.old,
                        money: postdata.beds.bed4.money,
                    },
                    bed5: {
                        sex: postdata.beds.bed5.sex,
                        old: postdata.beds.bed5.old,
                        money: postdata.beds.bed5.money,
                    },
                    bed6: {
                        sex: postdata.beds.bed6.sex,
                        old: postdata.beds.bed6.old,
                        money: postdata.beds.bed6.money,
                    },
                },
            };
            // $http去后台保存数据
            $http({
                method: 'POST',
                url: config.apiUrl + 'Invitation/saveTheInvitation',
                data: datas,
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

        var topay = function(postdata) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            var datas = {
                user_id: postdata.user_id,
                invite_id: postdata.invite_id,
                bed_id: postdata.bed_id,
            };
            // $http去后台获取数据
            $http({
                method: 'POST',
                url: config.apiUrl + 'Invitation/topay',
                data: datas,
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getInvitationsBytime = function(time) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getInvitationsBytime',
                params: { time: time },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(self.invitations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getInvitationsBycityid = function(cityid) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getInvitationsBycityid',
                params: { cityid: cityid },
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

        var getInvitationByid = function(id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Invitation/getInvitationByid',
                params: { id: id },
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

            // 保存趣约
            saveTheInvitation: function(postdata) {
                return saveTheInvitation(postdata);
            },

            // 支付
            topay: function (postdata) {
                return topay(postdata);
            },

            // 通过时间获取趣约
            getInvitationsBytime: function(time) {
                return getInvitationsBytime(time);
            },

            // 按出发城市id选出趣约
            getInvitationsBycityid: function(cityid) {
                return getInvitationsBycityid(cityid);
            },

            // 获取趣约详情byid
            getInvitationByid: function(id) {
                return getInvitationByid(id);
            },




        };
    }]);
