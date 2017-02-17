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
            idCardNum: '',
            nickName: '',
            sex: '',
            old: '',
            idCardNum: '',
            phoneNum: '',
            email: '',
            birthday: '',
            location: '',
            imgUrl: '',
        };
        var url = config.apiUrl + 'user/';
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
            if (self.user.openid === '') {
                var openid = getOpenid();
                $http({
                    method: 'GET',
                    url: url + 'getUserByOpenid?openid=' + openid,
                    data: { openid: getOpenid() }
                }).then(function successCallback(response) {
                    console.log('获取用户信息成功：');
                    console.log(response);
                    if (typeof response.data.errorCode !== 'undefined') {
                        console.log('系统发生错误：' + response.data.error);
                    } else {
                        var user = response.data.data;
                        self.user = {
                            openid: user.Openid,
                            nickName: user.NickName,
                            sex: user.Sex,
                            old: user.Old,
                            idCardNum: user.IdCardNum,
                            phoneNum: user.PhoneNum,
                            email: user.Email,
                            birthday: user.Birthday,
                            location: user.Location,
                            imgUrl: user.ImgUrl,
                        };
                        cookies.put('openid', user.Openid);
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
        var saveUser = function() {
            // 定义promise解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var postData = self.user;

            // 调用$http请求，保存用户信息
            $http({
                method: 'POST',
                url: url + 'saveUser?',
                data: {user: postData},
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
            saveUser: function() {
                return saveUser();
            },
        };
    }]);
