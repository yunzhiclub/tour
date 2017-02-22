'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HomeCtrl
 * @description
 * # 首页的控制器
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('HomeCtrl', ['$scope', 'destination', function ($scope, destination) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  }]);
