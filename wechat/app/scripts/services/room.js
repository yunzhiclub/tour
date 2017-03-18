'use strict';

/**
 * @ngdoc service
 * @name wechatApp.room
 * @description
 * # room
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('room', function() {
        // Service logic
        var self = this;
        self.room = {
            sex: 1,
            old: '0~~25',
            money: '',
            maxMoney: '',
        };

        // 改变最大值
        var changeMaxMoney = function(changeData) {
            self.room.maxMoney = self.room.maxMoney - changeData;
        };
        // Public API here
        return {
            changeMaxMoney: function(changeData) {
                 changeMaxMoney(changeData);
            },
            room: self.room,
        };
    });
