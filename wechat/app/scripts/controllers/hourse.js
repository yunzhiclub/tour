'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HourseCtrl
 * @description
 * # HourseCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HourseCtrl', ['$stateParams', '$uibModal', '$log', '$document', '$scope', function($uibModal, $log, $document, $scope, $stateParams) {
         console.log($stateParams.timeId);
        if ($stateParams.timeId !== undefined) {
            // 选用路线的实际价格
            console.log($stateParams.timeId);
        }



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
