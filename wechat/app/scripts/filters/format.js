'use strict';

/**
 * @ngdoc filter
 * @name wechatApp.filter:format
 * @function
 * @description
 * # format
 * Filter in the wechatApp.
 */
angular.module('wechatApp')
    .filter('format', function() {
        return function(iterms) {
        	if (iterms.length === 0) {
        		return iterms;
        	}
            var data = [];
            var datas = [];
            angular.forEach(iterms, function(iterm, key) {
            	
                data.push(iterm);
                if (0 === ((key + 1) % 3)) {
                    datas.push(data);
                    data = [];
                }
            });

            if (iterms.length % 3 !== 0) {
                datas.push(data);
            }
            console.log(datas);
            

            return datas;
        };
    });
