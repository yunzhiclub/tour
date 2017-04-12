'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:MainCtrl
 * @根控制器，负责权限控制及用户基本信息的获取
 * # MainCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('MainCtrl', ['customer', '$scope', 'cookies', 'jssdk',  function(customer, $scope, cookies, jssdk) {
        // 用户未登录，则进行登录

        if (!customer.isLogin()) {
            customer.login();
            // 用户已登录，进行用户的初始化
        } else {
            customer.init();
        }
        // 获取用户信息
        customer.getCustomerByOpenid().then(function success(customer) {
            $scope.customer = customer;
        }, function error() {});
        
        // 获取jssdk的配置信息
        jssdk.getConfig();

        // $scope.test = function() {
        //     return jssdk.downloadImg('rJAj-qyHntGvt3IjmGbWh43UxXwTAwHl5isrdM1Gf8kDg7_2cuGEbzNlvlGgdEJS');
        // }
    }]);
