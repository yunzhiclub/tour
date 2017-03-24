'use strict';

/**
 * @ngdoc function
 * @name wechatApp.controller:HourseCtrl
 * @description
 * # HourseCtrl
 * Controller of the wechatApp
 */
angular.module('wechatApp')
    .controller('HourseCtrl', ['$uibModal', '$log', '$document', '$scope', '$stateParams', 'order', 'room', '$state', 'invitation',
        function($uibModal, $log, $document, $scope, $stateParams, order, room, $state, invitation) {
            var default = 0;
            if ($stateParams.timeId !== undefined) {
                // 选用选择的出发时间给本次邀约实体复制
                order.startTimeId = $stateParams.timeId;

                // 获取本次出发时间的价格
                
            } else {
                // 选用默认出发时间
                order.startTimeId = null;
            }

            // 设置默认是公开
            $scope.isPublic = 1;

            // 默认实例截止时间
            var deadLine = order.deadLine;
            $scope.deadLine = new Date(deadLine);

            // 设置默认选择支付房间
            $scope.payRoomNumber = 1;

            // 设置开始的最大的金额
            var maxMoney = 5000;
            room.room.maxMoney = maxMoney;

            // 是否接受条款
            $scope.isAgree = false;


            // 弹出框
            var $ctrl = $scope;
            $ctrl.animationsEnabled = true;
            // 打开弹出框
            var open = function(size, parentSelector, room, money, callBack = undefined) {
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
                            olds: [1, 2, 3],
                            sexs: [1, 0],
                            room: room,
                            money: money,
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



            // 六间房间人员信息 0 不支付 tag是用来查找要支付的房间
            var roomDatas = [];
            $scope.firstRoom = {
                tag: 1,
                sex: 1,
                old: 1,
                money: 0,
                type: 1,
                isPay: 0
            };
            $scope.scendRoom = {
                tag: 2,
                old: 1,
                sex: 1,
                money: 0,
                type: 1,
                isPay: 0
            };
            $scope.thirdRoom = {
                tag: 3,
                old: 1,
                sex: 1,
                money: 0,
                type: 2,
                isPay: 0
            };
            $scope.fourthRoom = {
                tag: 4,
                old: 1,
                sex: 1,
                money: 0,
                type: 2,
                isPay: 0
            };
            $scope.fifthRoom = {
                tag: 5,
                old: 1,
                sex: 1,
                money: 0,
                type: 3,
                isPay: 0
            };
            $scope.sixthRoom = {
                tag: 6,
                old: 1,
                sex: 1,
                money: 0,
                type: 3,
                isPay: 0
            };





        /*
         设置房间人员信息
         房间选择是类型type(1, 2, 3), 房间上type数字相同说明是一间房间
         @param whichRoom int(1,2,3,4,5,6)那个房间 
         @param type
        */

            $scope.setOptions = function(whichRoom, money) {
                open(null, null, room, money, function callBack(selectedItems) {
                    switch (whichRoom) {
                        case 1:
                            $scope.firstRoom.sex = selectedItems.sex;
                            $scope.firstRoom.old = selectedItems.old;
                            $scope.firstRoom.money = selectedItems.money;

                            break;
                        case 2:
                            $scope.scendRoom.sex = selectedItems.sex;
                            $scope.scendRoom.old = selectedItems.old;
                            $scope.scendRoom.money = selectedItems.money;

                            break;
                        case 3:
                            $scope.thirdRoom.sex = selectedItems.sex;
                            $scope.thirdRoom.old = selectedItems.old;
                            $scope.thirdRoom.money = selectedItems.money;

                            break;
                        case 4:
                            $scope.fourthRoom.sex = selectedItems.sex;
                            $scope.fourthRoom.old = selectedItems.old;
                            $scope.fourthRoom.money = selectedItems.money;

                            break;
                        case 5:
                            $scope.fifthRoom.sex = selectedItems.sex;
                            $scope.fifthRoom.old = selectedItems.old;
                            $scope.fifthRoom.money = selectedItems.money;

                            break;
                        case 6:
                            $scope.sixthRoom.sex = selectedItems.sex;
                            $scope.sixthRoom.old = selectedItems.old;
                            $scope.sixthRoom.money = selectedItems.money;

                            break;
                    }
                });
            };

            
            // 必须是六人组必须每个房间都设置人的信息,目前生成邀约的所有的信息已经全有了
            $scope.submit = function() {

                // 把六个房间信息push进数组
                roomDatas.push($scope.firstRoom);
                roomDatas.push($scope.scendRoom);
                roomDatas.push($scope.thirdRoom);
                roomDatas.push($scope.fourthRoom);
                roomDatas.push($scope.fifthRoom);
                roomDatas.push($scope.sixthRoom);

                // 定义变量
                var totalMoney = 0;

                // 求出选择房间设置的总金额
                angular.forEach(roomDatas, function(value, key) {
                    totalMoney += value.money;
                });


                if (totalMoney !== maxMoney) {
                    // 还需要的钱数
                    var moreMoney = maxMoney - totalMoney;
                    alert('还差' + moreMoney + "元");
                } else {
                    // 遍历数组设置支付房间
                    angular.forEach(roomDatas, function(value, key) {
                        if (value.tag === $scope.payRoomNumber) {
                            value.isPay = 1;
                        }
                    });

                    // 给order实例赋值
                    order.isPublic = $scope.isPublic;
                    order.deadLine = $scope.deadLine.getTime();
                    order.roomDatas = roomDatas;

                    // 最后设置发起邀约的人
                    order.customerId = $scope.customer.id;

                    console.log(order);

                    // 调用生成邀约的借口并支付
                    invitation.saveTheInvitation(order).then(function successCallBack(response) {
                        console.log(response);
                    }, function errorCallBack() {

                    });
                    // 调到支付成功页面
                    $state.go('paysuccess');
                }

            };
        }
    ]);
