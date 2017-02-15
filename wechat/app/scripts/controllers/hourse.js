'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HourseCtrl
 * @description
 * # HourseCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HourseCtrl', function($uibModal, $log, $document, $scope) {
        this.awesomeThings = [
            'HTML5 Boilerplate',
            'AngularJS',
            'Karma'
        ];
        var $ctrl = $scope;
        $ctrl.items1 = ['0~25', '25~35', '35~'];
        $ctrl.items2 = ['男', '女'];

        $ctrl.animationsEnabled = true;

        $ctrl.open = function(size, parentSelector, type) {
            var parentElem = parentSelector ?
                angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
            var modalInstance = $uibModal.open({
                animation: $ctrl.animationsEnabled,
                ariaLabelledBy: 'modal-title',
                ariaDescribedBy: 'modal-body',
                templateUrl: 'myModalContent.html',
                controller: 'ModalInstanceCtrl',
                controllerAs: '$ctrl',
                size: size,
                appendTo: parentElem,
                resolve: {
                    items: function() {
                    	if (type == 1) {
                    		return $ctrl.items1;
                    	} else if (type == 2) {
                    		return $ctrl.items2;
                    	}
                       
                    }
                }
            });

            modalInstance.result.then(function(selectedItem) {
            	if (type == 1) {
            		$ctrl.selected1 = selectedItem;
            	} else if (type = 2) {
            		$ctrl.selected2 = selectedItem;
            	}
                
            }, function() {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };
    });
