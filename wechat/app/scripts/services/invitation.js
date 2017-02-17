'use strict';

/**
 * @ngdoc service
 * @name wechatApp.invitation
 * @description
 * # invitation
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
  .factory('invitation', ['config', '$http', '$q', function (config, $http, $q) {
    // Service logic
    // ...

    var meaningOfLife = 42;

    // Public API here
    return {
      someMethod: function () {
        return meaningOfLife;
      }
    };
  }]);
