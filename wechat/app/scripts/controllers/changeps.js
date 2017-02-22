'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:ChangepsCtrl
 * @description
 * # ChangepsCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('ChangepsCtrl', ['$scope', 'user', function ($scope, user) {

    // 性别的选项
    $scope.options = [
    	{value: 1, sex: '男'},
    	{value: 0, sex: '女'},
    ];

    $scope.submit = function() {
    	user.saveUser($scope.user).then(function success() {
    		console.log('保存成功');
    	}, function error() {
    		console.log('保存失败');
    	});
    };
  }]);
