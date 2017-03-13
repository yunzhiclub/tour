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

        // 默认实例截止时间
        $scope.deadLine = new Date(2010, 11, 28, 14, 57);      
    
        var $ctrl = $scope;

        $ctrl.animationsEnabled = true;


        // 打开弹出框
        var open = function(size, parentSelector, callBack = undefined) {
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
                        olds: ['0~25', '25~35', '35~>>'],
                        sexs: [1, 0],
                    }
                }
            });

            modalInstance.result.then(function(selectedItems) {
            	console.log(selectedItems);
                callBack(selectedItems);
            }, function() {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        // 六间房间人员信息 0 不支付
        var roomDatas = [];
        $scope.firstRoom = {tag: 1, sex:'', old:'', money:'', type: '', isPay: 0};
        $scope.scendRoom = {tag: 2, old:'', money:'', type: '', isPay: 0};
        $scope.thirdRoom = {tag: 3, old:'', money:'', type: '', isPay: 0};
        $scope.fourthRoom = {tag: 4, old:'', money:'', type: '', isPay: 0};
        $scope.fifthRoom = {tag: 5, old:'', money:'', type: '', isPay: 0};
        $scope.sixthRoom = {tag: 6, old:'', money:'', type: '', isPay: 0};


        // 设置默认选择支付房间
        $scope.payRoomNumber = 1;
        /*
         设置房间人员信息
         房间选择是类型type(1, 2, 3)房间上type数组一样说明是一间房间
         @param whichRoom int(1,2,3,4,5,6)那个房间 
         @param type
        */

        $scope.setOptions = function(whichRoom, type) {
            open(null, null, function callBack(selectedItems) {
                switch(whichRoom) {
                    case 1:
                        $scope.firstRoom = selectedItems;
                        $scope.firstRoom.type = type;
                        roomDatas.push($scope.firstRoom);
                    break;
                    case 2:
                        $scope.scendRoom = selectedItems;
                        $scope.scendRoom.type = type;
                        roomDatas.push($scope.scendRoom);
                    break;
                    case 3:
                        $scope.thirdRoom = selectedItems;
                        $scope.thirdRoom.type = type;
                        roomDatas.push($scope.thirdRoom);
                    break;
                    case 4:
                        $scope.fourthRoom = selectedItems;
                        $scope.fourthRoom.type = type;
                        roomDatas.push($scope.fourthRoom);
                    break;
                    case 5:
                        $scope.fifthRoom = selectedItems;
                        $scope.fifthRoom.type = type;
                        roomDatas.push($scope.fifthRoom);
                    break;
                    case 6:
                        $scope.sixthRoom = selectedItems;
                        $scope.sixthRoom.type = type;
                        roomDatas.push($scope.sixthRoom);
                    break;
                }
            });
        };

        // 必须是六人组必须每个房间都设置人的信息,目前生成邀约的所有的信息已经全有了
        $scope.submit = function() {
            if(roomDatas.length !== 6) {
                alert("请选择房间信息");
            }

            // 遍历数组设置支付房间
            angular.forEach(roomDatas, function(value, key) {
                if (value.tag === payRoomNumber) {
                    value.isPay = 1;
                }
            });

            // 给order实例赋值
            order.isPublic = isPublic;

            // 目前还有格式的问题（现在是date()）
           // order.deadLine = deadLine;
           order.roomDatas = roomDatas;

           // 最后设置发起邀约的人
           order.customerId = $scope.customer.id;
        };
    }]);
