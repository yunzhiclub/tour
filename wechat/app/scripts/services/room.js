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
            old: 1,
            money: 0,
            maxMoney: 0,
        };

        var getRoom = function(argument) {
            return self.room;
        };
        // 改变最大值
        var changeMaxMoney = function(changeData) {
            self.room.maxMoney = self.room.maxMoney - changeData;
        };

        var setSexValue = function(sex) {
           self.room.sex = sex;
        };

        var setMoneyValue = function(money) {
           self.room.money = money;
        };

         var setOldValue = function(old) {
           self.room.old = old;
        };

        var setMaxMoneyValue = function(maxMoney) {
           self.room.maxMoney = maxMoney;
        };
        // Public API here
        return {
            changeMaxMoney: function(changeData) {
                 changeMaxMoney(changeData);
            },
            getRoom: function () {
                return getRoom();
            },
            setSexValue: function(sex) {
                setSexValue(sex);
            },
            setMoneyValue: function(money) {
                setMoneyValue(money);
            },
            setOldValue: function(old) {
               setOldValue(old);
            },
            setMaxMoneyValue: function(maxMoney) {
                setMaxMoneyValue(maxMoney);
            }
        };
    });
