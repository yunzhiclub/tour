'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
  .controller('AboutCtrl', function ($scope) {
    this.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma',
    ];

    $scope.hello = 'hello';
  });