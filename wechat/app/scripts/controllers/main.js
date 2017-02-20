'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:MainCtrl
 * @根控制器，负责权限控制及用户基本信息的获取
 * # MainCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('MainCtrl', ['user', '$scope', 'route',  function(user, $scope, route) {
        // 用户未登录，则进行登录
        if (!user.isLogin()) {
            user.login();

            // 用户已登录，进行用户的初始化
        } else {
            user.init();
        }
        // 获取用户信息
        // user.getUser().then(function success(user) {
        //     $scope.user = user;
        // }, function error() {});
        $scope.test = function() {
            console.log("test");
            route.collecteTheRoute(1, 4).then(function success(response) {
                console.log("chenggong");
            }, function error(response) {
                console.log("shibai");
            });
        }
    }]);
