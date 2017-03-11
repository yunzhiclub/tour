'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HourseCtrl
 * @description
 * # HourseCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HourseCtrl', ['$uibModal', '$log', '$document', '$scope', '$stateParams', 'order', function($uibModal, $log, $document, $scope, $stateParams, order) {
        if ($stateParams.timeId !== undefined) {
            // 选用选择的出发时间给本次邀约实体复制
            order.startTimeId = $stateParams.timeId;
        } else {
            // 选用默认出发时间
            order.startTimeId = null;
        }

        // 设置默认是公开
        $scope.isPublic = 1;

        $scope.deadLine = new Date(2010, 11, 28, 14, 57);      
    
        var $ctrl = $scope;
        $ctrl.items1 = ['0~25', '25~35', '35~'];
        $ctrl.items2 = ['男', '女'];

        $ctrl.animationsEnabled = true;


        // 打开弹出框
        $ctrl.open = function(size, parentSelector) {
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
                    items: {
                        terms1: ['0~25', '25~35', '35~'],
                        terms2: ['男', '女'],
                    }
                }
            });

            modalInstance.result.then(function(selectedItems) {
            	console.log(selectedItems);
                
            }, function() {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };
    }]);
