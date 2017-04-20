'use strict';

/**
 * @ngdoc service
 * @name wechatApp.customer
 * @description
 * # customer
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('customer', ['cookies', '$window', '$location', 'config', '$q', 'server', function(cookies, $window, $location, config, $q, server) {
        // Service logic
        // ...
        var self = this;
        self.customer = {
            id: '',
            openid: 'oYIbNwFiyIJK25Ifro0LKww03N2g',
            nickName: '',
            sex: '',
            headImg: { headImgUrl: null, serverId: null },
            phone: '',
            email: '',
            city: '',
            idcard: '',
            birthday: '',
            country: '',
            province: '',
            frontIdCardImg: { frontIdCardImgCardImgUrl: null, serverId: null },
            backIdCardImgUrl: { backIdCardImgUrl: null, serverId: null },
        };
        var url = 'customer/';
        var siteUrl = config.siteUrl;
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
            if (self.customer.openid === '') {
                var param = $location.search();
                if (typeof param.openid !== 'undefined') {
                    openid = param.openid;
                }
            } else {
                openid = self.customer.openid;
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
        var getCustomerByOpenid = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // 当前customer为默认值，则调用$http请求，获取当前customer
            if (self.customer.openid === 'oYIbNwFiyIJK25Ifro0LKww03N2g') {
                var openid = getOpenid();
                var paramUrl = url + 'getCustomerByOpenid';
                var data = { openid: openid };
                // 请求数据
                server.http(paramUrl, data, function successCallback(response) {
                    console.log('获取用户信息成功：');
                    console.log(response);
                    if (typeof response.data.errorCode !== 'undefined') {
                        console.log('系统发生错误：' + response.data.error);
                    } else {
                        var customer = response.data.data;
                        self.customer = {
                            id: customer.id,
                            openid: customer.openid,
                            nickName: customer.nick_name,
                            sex: customer.sex,
                            headImg: { headImgUrl: customer.head_img_url, serverId: null },
                            city: customer.city,
                            phone: customer.phone,
                            email: customer.email,
                            idcard: customer.idcard,
                            birthday: customer.birthday,
                            frontIdCardImg: { frontIdCardImgUrl:  customer.card_img_front_url, serverId: null },
                            backIdCardImg: { backIdCardImgUrl: customer.card_img_back_url, serverId: null },
                        };
                        cookies.put('openid', customer.openid);
                    }
                    deferred.resolve(self.customer); //执行成功
                }, function errorCallback(response) {
                    console.log(response);
                    deferred.reject(); //执行失败
                });

                // 当前customer存在，则
            } else {
                deferred.resolve(self.customer); //执行成功
            }
            return promise;
        };

        // 保存用户修改
        var saveCustomer = function(datas) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // 调用$http请求，保存用户信息
            var paramUrl = url + 'saveCustomer?';
            var data = { data: datas };
            server.http(paramUrl, data, function successCallback(response) {
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
        var getCollectionsByCustomer_id = function(customer_id, openid) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;


            // 调用$http
            var paramUrl = url + 'getCollectionsByCustomerId';
            var data = { customer_id: customer_id, openid: openid };
            server.http(paramUrl, data, function successCallback(response) {
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

        var getOrdersByCustomerId = function(customer_id) {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getOrdersByCustomerId';
            var data = { customer_id: customer_id };
            server.http(paramUrl, data, function successCallback(response) {
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

            var paramUrl = url + 'setInviteIsPublic';
            var data = { id: id, flag: flag };

            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });
            return promise;
        };

        var getInvitationsByCustomerIdAndStatus = function(status, customer_id) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = url + 'getInvitationsByCustomerIdAndStatus';
            var data = { status: status, customer_id: customer_id };

            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败
            });

            return promise;
        };

        var toEvaluate = function(postData) {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            var datas = {
                invite_id: postData.id,
                customer_id: postData.customer_id,
                text: postData.text,
            };

            var paramUrl = url + 'toEvaluate';
            var data = datas;
            server.http(paramUrl, data, function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 

                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                deferred.reject(response); //执行失败 
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
            getCustomerByOpenid: function() {
                return getCustomerByOpenid();
            },

            // 初始化
            init: function() {
                clearOpenidOfParam(); // 清理URL中的OPENID，防止链接转发引起的错误
            },

            // 保存数据
            saveCustomer: function(datas) {
                return saveCustomer(datas);
            },

            // 获取收藏
            getCollectionsByCustomer_id: function(customer_id, openid) {
                return getCollectionsByCustomer_id(customer_id, openid);
            },

            // 获取自己的全部订单
            getOrdersByCustomerId: function(customer_id) {
                return getOrdersByCustomerId(customer_id);
            },

            // 设置趣约是否公开（必须是自己发布的）
            setInviteIsPublic: function(id, flag) {
                return setInviteIsPublic(id, flag);
            },

            // 根据订单状态和用户id获取订单列表(包括自己发布的)
            getInvitationsByCustomerIdAndStatus: function(status, customer_id) {
                return getInvitationsByCustomerIdAndStatus(status, customer_id);
            },

            // 按趣约id和用户id评价订单
            toEvaluate: function(postData) {
                return toEvaluate(postData);
            },
        };
    }]);
