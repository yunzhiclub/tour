'use strict';

/**
 * @ngdoc service
 * @name wechatApp.user
 * @description
 * # user
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('user', ['cookies', '$window', '$location', 'config', '$http', '$q', function(cookies, $window, $location, config, $http, $q) {
        // Service logic
        // ...
        var self = this;
        self.user = {
            openid: 'oYIbNwFiyIJK25Ifro0LKww03N2g',
            nickName: '',
            sex: '',
            headImg: {headImgUrl: null, serverId: null},
            num: '',
            email: '',
            city: '',
            idcard: '',
            birthday: '',
            frontIdCardImg: {frontIdCardImgCardImgUrl: null, serverId: null},
            backIdCardImgUrl: {backIdCardImgUrl: null, serverId: null},
        };
        var url = config.apiUrl + 'customer/';
        // 用户是否登陆
        var isLogin = function() {
            if (typeof getOpenid() === 'undefined') {
                return false;
            } else if (getOpenid() === '') {
                return false;
            } else {
                return true;
            }
        };

        // 防止带有OPENID的链接并转发, 清理openid信息
        var clearOpenidOfParam = function() {
            $location.path($location.path()).search({});
        };

        // 用户登陆
        var login = function() {
            var openid;
            // 获取使用get方式传入openid信息
            if (self.user.openid === '') {
                var param = $location.search();
                if (typeof param.openid !== 'undefined') {
                    openid = param.openid;
                }
            } else {
                openid = self.user.openid;
            }

            var callback = $window.location.href;
            if ((typeof openid === 'undefined') || (openid === '')) {
                // 跳转认证 
                $window.location.href = config.oauthUrl + '?callback=' + encodeURIComponent(callback);
            } else {
                cookies.put('openid', openid);
                clearOpenidOfParam();
                console.log("登录成功");
            }
            return;
        };

        // 获取用户的openid
        var getOpenid = function() {
            return cookies.get('openid');
        };

        // 获取用户信息
        var getUser = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // 当前user为默认值，则调用$http请求，获取当前user
            if (self.user.openid === 'oYIbNwFiyIJK25Ifro0LKww03N2g') {
                var openid = getOpenid();
                $http({
                    method: 'GET',
                    url: url + 'getCustomerByOpenid?openid=' + openid,
                    data: { openid: getOpenid() }
                }).then(function successCallback(response) {
                    console.log('获取用户信息成功：');
                    console.log(response);
                    if (typeof response.data.errorCode !== 'undefined') {
                        console.log('系统发生错误：' + response.data.error);
                    } else {
                        var user = response.data.data;
                        self.user = {
                            openid: user.openid,
                            nickName: user.nick_name,
                            sex: user.sex,
                            headImg: {headImgUrl: user.head_img_url, serverId: 'rJAj-qyHntGvt3IjmGbWh43UxXwTAwHl5isrdM1Gf8kDg7_2cuGEbzNlvlGgdEJS'},
                            city: user.city,
                            num: '13920884917',
                            email: '2819786276@qq.com',
                            idcard: '130272199511927782',
                            birthday: '1288323623006',
                            frontIdCardImg: {frontIdCardImgUrl: '', serverId: null},
                            backIdCardImg: {backIdCardImgUrl: '', serverId: null},
                        };
                        cookies.put('openid', user.openid);
                    }
                    deferred.resolve(self.user); //执行成功
                }, function errorCallback(response) {
                    console.log(response);
                    deferred.reject(); //执行失败
                });

                // 当前user存在，则
            } else {
                deferred.resolve(self.user); //执行成功
            }
            return promise;
        };

        // 保存用户修改
        var saveUser = function(datas) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // 调用$http请求，保存用户信息
            $http({
                method: 'GET',
                url: url + 'saveCustomer?',
                params: { openid: datas.openid, data: datas },
            }).then(function successCallback(response) {
                console.log('保存用户信息成功：');
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 处理数据

                }
                deferred.resolve(); // 执行成功
            }, function errorCallback(response) {
                console.log(response);
                deferred.reject(); //执行失败
            });
            return promise;
        };

        // 获取用户收藏
        var getCollectionsByuserid = function(user_id) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;


            // 调用$http请求，保存用户信息
            $http({
                method: 'GET',
                url: url + 'getCollectionsByCustomerId?',
                params: { customer_id: user_id },
            }).then(function successCallback(response) {
                console.log('保存用户信息成功：');
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 处理数据

                }
                deferred.resolve(); // 执行成功
            }, function errorCallback(response) {
                console.log(response);
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getOrdersByuserid = function(user_id) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;


            // 调用$http请求，保存用户信息
            $http({
                method: 'GET',
                url: url + 'getOrdersByCustomerId?',
                params: { customer_id: user_id },
            }).then(function successCallback(response) {
                console.log('保存用户信息成功：');
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 处理数据

                }
                deferred.resolve(); // 执行成功
            }, function errorCallback(response) {
                console.log(response);
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var setInviteIsPublic = function(id, flag) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: url + 'setInviteIsPublic',
                params: { id: id, flag: flag },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var getInvitationsByCustomerIdAndStatus = function(status, user_id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: url + 'getInvitationsByCustomerIdAndStatus',
                params: { status: status, customer_id: user_id },
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };

        var toEvaluate = function(postData) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            var datas = {
                id: postData.id,
                user_id: postData.user_id,
                text: postData.text,
            };

            // $http去后台保存数据
            $http({
                method: 'POST',
                url: url + 'toEvaluate',
                data: datas,
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
            return promise;
        };


        // Public API here
        return {
            // 判断用是否登陆
            isLogin: function() {
                return isLogin();
            },

            // 用户登录
            login: function() {
                return login();
            },

            // 获取OPENID
            getOpenid: function() {
                return getOpenid();
            },

            // 获取用户信息
            getUser: function() {
                return getUser();
            },

            // 初始化
            init: function() {
                clearOpenidOfParam(); // 清理URL中的OPENID，防止链接转发引起的错误
            },

            // 保存数据
            saveUser: function(datas) {
                return saveUser(datas);
            },

            // 获取收藏
            getCollectionsByuserid: function(user_id) {
                return getCollectionsByuserid(user_id);
            },

            // 获取自己的全部订单
            getOrdersByuserid: function(user_id) {
                return getOrdersByuserid(user_id);
            },

            // 设置趣约是否公开（必须是自己发布的）
            setInviteIsPublic: function(id, flag) {
                return setInviteIsPublic(id, flag);
            },

            // 根据订单状态和用户id获取订单列表(包括自己发布的)
            getInvitationsByCustomerIdAndStatus: function(status, user_id) {
                return getInvitationsByCustomerIdAndStatus(status, user_id);
            },

            // 按趣约id和用户id评价订单
            toEvaluate: function(postData) {
                return toEvaluate(postData);
            },
        };
    }]);
