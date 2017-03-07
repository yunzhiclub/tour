'use strict';

/**
 * @ngdoc service
 * @name wechatApp.jssdk
 * @description
 * # jssdk
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('jssdk', ['$q', 'config', 'server', function($q, config, server) {
        // Service logic

        // 获取当前的url
        var url = window.location.href.replace(window.location.hash, '');

        // 定制配置信息
        var jssdkConfig = {
            jsApiList: ['chooseImage', 'uploadImage'],
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
                        alert('数据返回错误', +response.status);
                    }
                }
                deferred.resolve(); //执行成功
            }, function errorCallback(response) {
                alert('数据返回错误:' + response.status);
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
        var chooseImg = function(callBack = undefined) {

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

        // Public API here
        return {
            // 获取jssdk配置
            getConfig: function() {
                return getConfig();
            },

            // 选择上传图片获取media_id
            chooseImg: function(callBack = undefined) {
                chooseImg(callBack);
            },
        };
    }]);
