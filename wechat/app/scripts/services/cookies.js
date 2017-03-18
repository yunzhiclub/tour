'use strict';

/**
 * @ngdoc service
 * @name wechatApp.cookies
 * @加入cookie前缀，重写angular自动的$cookies
 * # cookies
 * Service in the wechatApp.
 */
angular.module('wechatApp')
  .service('cookies', ['$cookies', 'config', function ($cookies, config) {
  	var prefix = config.cookies.prefix;
    // AngularJS will instantiate a singleton by calling "new" on this function
  	this.get = function(key) {
        key = prefix + key;
        return $cookies.get(key);
    };

    this.getAll = function() {
        return $cookies.getAll();
    };

    this.getObject = function(key){
        key = prefix + key;
        return $cookies.getObject(key);
    };

    this.put = function(key, value, options){
        key = prefix + key;
        return $cookies.put(key, value, options);
    };

    this.putObject = function(key, value, options) {
        key = prefix + key;
        return $cookies.putObject(key, value, options);
    };
    this.remove = function(key, options){
        key = prefix + key;
        return $cookies.remove(key, options);
    };
    this.$cookies = $cookies;
  }]);
