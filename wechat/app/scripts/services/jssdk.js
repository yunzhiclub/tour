'use strict';

/**
 * @ngdoc service
 * @name wechatApp.jssdk
 * @description
 * # jssdk
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('jssdk', ['$q', 'config', 'server', '$location', function($q, config, server, $location) {
        // Service logic

        // 获取当前的url
        var url = window.location.href.replace(window.location.hash, '');
        // 定制配置信息
        var jssdkConfig = {
            jsApiList: ['chooseImage', 'uploadImage', 'chooseWXPay'],
            debug: true,
            appId: '',
        };
        // 发送请求，获取配置信息
        var getConfig = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = 'Jssdk/getConfig';
            var data = { url: encodeURIComponent(url) };

            server.http(paramUrl, data, function successCallback(response) {
                console.log(response.data.data);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    // 返回200说明请求正常，则调用系统初始化函数
                    if (response.status === 200) {
                        // 调jssdk初始化函数
                        init(response.data.data);
                    } else {
                        console.log('数据返回错误', +response.status);
                    }
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                console.log('数据返回错误:' + response.status);
                deferred.reject(); //执行失败
            });

            return promise;
        };

        // 系统初始化
        var init = function(config) {
            jssdkConfig.appId = config.appId;
            jssdkConfig.nonceStr = config.nonceStr;
            jssdkConfig.signature = config.signature;
            jssdkConfig.timestamp = config.timestamp;
            wx.config(jssdkConfig);
        };

        // 上传图片获取serverid
        var chooseImg = function(callBack) {

            // 定义localid和serverid
            var imgs = { localId: null, serverId: null };
            wx.chooseImage({
                count: 1, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function(res) {

                    // 返回选定照片的本地ID列表
                    imgs.localId = res.localIds[0];


                    // 调用上传图片接口
                    wx.uploadImage({
                        localId: imgs.localId, // 需要上传的图片的本地ID，由chooseImage接口获得
                        isShowProcess: 1,
                        success: function(res) {
                            // 返回图片服务器ID res.serverId,然后执行回调函数
                            imgs.serverId = res.serverId;
                            callBack(imgs);

                        },
                        fail: function(res) {
                            alert('上传图片失败');
                        },
                    });
                    // $scope.imgurl = res.localIds[0];
                    // $scope.$apply();
                    // var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
                },
            });
        };
        // 获取支付参数
        var getPayParams = function (postData, isCreateInvite) {
            // 获得支付参数
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;
            var paramUrl = 'Jssdk/getPayParams';
            var data = {data: postData, isCreateInvite:isCreateInvite};

            server.http(paramUrl, data, function successCallback(response) {
                console.log(response.data.data);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理
                    // 返回200说明请求正常，则调用系统初始化函数
                    if (response.status === 200) {
                        // 逻辑处理

                    } else {
                        console.log('数据返回错误', +response.status);
                    }
                }
                deferred.resolve(response.data.data); //执行成功
            }, function errorCallback(response) {
                console.log('数据返回错误:' + response.status);
                deferred.reject(); //执行失败
            });
            return promise;
        };
        var toPay = function (params) {
            wx.chooseWXPay({
                timestamp: params.timeStamp, // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符
                nonceStr: params.nonceStr, // 支付签名随机串，不长于 32 位
                package: params.package, // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）
                signType: params.signType, // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'
                paySign: params.paySign, // 支付签名
                success: function (res) {
                    // 支付成功后的回调函数
                    // 调到支付成功的页面
                    $location.path('/paysuccess');
                }
            });
        };
        // Public API here
        return {
            // 获取jssdk配置
            getConfig: function() {
                return getConfig();
            },

            // 选择上传图片获取serverid
            chooseImg: function(callBack) {
                chooseImg(callBack);
            },
            // 获取支付参数
            getPayParams: function (postData, isCreateInvite) {
                return getPayParams(postData, isCreateInvite);
            },
            // 调用微信支付接口去支付
            toPay: function (params) {
                toPay(params);
            },
        };
    }]);
