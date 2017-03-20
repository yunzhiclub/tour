'use strict';

/**
 * @ngdoc overview
 * @name wechatApp
 * @description
 * # wechatApp
 *
 * Main module of the application.
 */
angular
    .module('wechatApp', [
        'ngAnimate',
        'ngAria',
        'ngCookies',
        'ngMessages',
        'ngResource',
        'ngRoute',
        'ngSanitize',
        'ngTouch',
        'ui.router',
        'angular-loading-bar',
        'ui.bootstrap',
    ])
    .config(['$stateProvider', '$urlRouterProvider', 'cfpLoadingBarProvider', '$compileProvider', function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider, $compileProvider) {
        // 设置LoadingBar HTML Loading模板
        cfpLoadingBarProvider.spinnerTemplate = '<div id="loadingToast" ng-show=""><div class="weui-mask_transparent"></div><div class="weui-toast"><i class="weui-loading weui-icon_toast"></i><p class="weui-toast__content">数据加载中</p></div></div>';
        $urlRouterProvider.otherwise('/home');
        $stateProvider
            .state('home', {
                url: '/home', // 首页
                templateUrl: 'views/home.html',
                controller: 'HomeCtrl',
            })
            .state('cities', {
                url: '/cities', // 定位城市
                templateUrl: 'views/cities.html',
                controller: 'CitiesCtrl',
            })
            .state('search', {
                url: '/search', // 搜索界面
                templateUrl: 'views/search.html',
                controller: 'SearchCtrl',
            })
            .state('invitedls', {
                url: '/invitedls', // 邀约的列表
                templateUrl: 'views/invitedls.html',
                controller: 'InvitedlsCtrl',
            })
            .state('ivdetail', {
                url: '/ivdetail', // 趣约详情
                templateUrl: 'views/ivdetail.html',
                controller: 'IvdetailCtrl',
            })
            .state('topay', {
                url: '/topay', // 支付界面
                templateUrl: 'views/topay.html',
                controller: 'TopayCtrl',
            })
            .state('paysuccess', {
                url: '/paysuccess', // 支付成功界面
                templateUrl: 'views/paysuccess.html',
                controller: 'PaysuccessCtrl',
            })
            .state('payfail', {
                url: '/payfail', // 支付失败界面
                templateUrl: 'views/payfail.html',
                controller: 'PayfailCtrl',
            })
            .state('toinvite', {
                url: '/toinvite', // 发布邀约的首页
                templateUrl: 'views/toinvite.html',
                controller: 'ToinviteCtrl',
            })
            .state('choseroute', {
                url: '/choseroute', // 选取路线的界面
                templateUrl: 'views/choseroute.html',
                controller: 'ChoserouteCtrl',
            })
            .state('placelist', {
                url: '/placelist/:regionId', // 国家列表界面
                templateUrl: 'views/placelist.html',
                controller: 'PlacelistCtrl',
            })
            .state('routes', {
                url: '/routes/:destinationCountryId', // 具体国家中的路线列表
                templateUrl: 'views/routes.html',
                controller: 'RoutesCtrl',
            })
            .state('classic', {
                url: '/classic', // 经典小团界面
                templateUrl: 'views/classic.html',
                controller: 'ClassicCtrl',
            })
            .state('clsdetail', {
                url: '/clsdetail/:routeId', // 经典小团详情界面
                templateUrl: 'views/clsdetail.html',
                controller: 'ClsdetailCtrl',
            })
            .state('sendtime', {
                url: '/sendtime', // 选择出发日期
                templateUrl: 'views/sendtime.html',
                controller: 'SendtimeCtrl',
            })
            .state('clsorder', {
                url: '/clsorder', // 经典小团填写订单界面
                templateUrl: 'views/clsorder.html',
                controller: 'ClsorderCtrl',
            })
            .state('visa', {
                url: '/visa', // 签证页面
                templateUrl: 'views/visa.html',
                controller: 'VisaCtrl',
            })
            .state('hourse', {
                url: '/hourse/:timeId', // 房间选择界面
                templateUrl: 'views/hourse.html',
                controller: 'HourseCtrl',
            })
            .state('personal', {
                url: '/personal', // 个人中心的页面
                templateUrl: 'views/personal.html',
                controller: 'PersonalCtrl',
            })
            .state('changeps', {
                url: '/changeps', // 个人信息修改页面
                templateUrl: 'views/changeps.html',
                controller: 'ChangepsCtrl',
            })
            .state('orderls', {
                url: '/orderls', // 全部订单列表页面
                templateUrl: 'views/orderls.html',
                controller: 'OrderlsCtrl',
            })
            .state('orderdetail', {
                url: '/orderdetail', // 订单详情页面
                templateUrl: 'views/orderdetail.html',
                controller: 'OrderdetailCtrl',
            })
            .state('nopayed', {
                url: '/nopayed', // 未支付列表页面
                templateUrl: 'views/nopayed.html',
                controller: 'NopayedCtrl',
            })
            .state('nofinish', {
                url: '/nofinish', // 未完成列表页面
                templateUrl: 'views/nofinish.html',
                controller: 'NofinishCtrl',
            })
            .state('noevaluate', {
                url: '/noevaluate', // 待点评列表页面
                templateUrl: 'views/noevaluate.html',
                controller: 'NoevaluateCtrl',
            })
            .state('insurance', {
                url: '/insurance', // 保险页面
                templateUrl: 'views/insurance.html',
                controller: 'InsuranceCtrl',
            })
            .state('invoice', {
                url: '/invoice', // 发票详情页面
                templateUrl: 'views/invoice.html',
                controller: 'InvoiceCtrl',
            })
            .state('addinvoice', {
                url: '/addinvoice', // 新增发票抬头页面
                templateUrl: 'views/addinvoice.html',
                controller: 'AddinvoiceCtrl',
            })
            .state('trlpeoples', {
                url: '/trlpeoples', // 出游人详情页面
                templateUrl: 'views/trlpeoples.html',
                controller: 'TrlpeoplesCtrl',
            })
            .state('paydetail', {
                url: '/paydetail', // 支付详情页面
                templateUrl: 'views/paydetail.html',
                controller: 'PaydetailCtrl',
            })
            .state('evaluate', {
                url: '/evaluate', // 评价页面
                templateUrl: 'views/evaluate.html',
                controller: 'EvaluateCtrl',
            })
            .state('collectionls', {
                url: '/collectionls', // 收藏列表
                templateUrl: 'views/collectionls.html',
                controller: 'CollectionlsCtrl',
            })
            .state('touristls', {
                url: '/touristls', // 游客列表
                templateUrl: 'views/touristls.html',
                controller: 'TouristlsCtrl',
            })
            .state('addtourist', {
                url: '/addtourist', // 新增游客页面
                templateUrl: 'views/addtourist.html',
                controller: 'AddtouristCtrl',
            })
            .state('tuisong', {
                url: '/tuisong', // 推送信息首页
                templateUrl: 'views/tuisong.html',
                controller: 'TuisongCtrl',
            })
            .state('tuisong1', {
                url: '/tuisong1', // 定制详情首页
                templateUrl: 'views/tuisong1.html',
                controller: 'Tuisong1Ctrl',
            })
            .state('tuisong2', {
                url: '/tuisong2', // 趣约详情首页
                templateUrl: 'views/tuisong2.html',
                controller: 'Tuisong2Ctrl',
            });
            
        // 为angularjs设置图片安全域    
        $compileProvider.imgSrcSanitizationWhitelist(/^\s*(wxlocalresource|https?|ftp|mailto|chrome-extension):/);

    }]).
// 弹出框同一处理方法
controller('ModalInstanceCtrl', function($uibModalInstance, items, $scope) {
       // 给选项赋值
        var $ctrl = $scope;
        $ctrl.olds = items.olds;
        $ctrl.sexs = items.sexs;

        // 那个房间触发的type和money
        var money = items.money;
        // 赋默认值
        $ctrl.selected = {
            old: 1,
            sex: 1,
            money: undefined,
        };

        // 双向数据绑定maxMoney
        console.log(items.room.room);
        $ctrl.maxMoney = items.room.room;

        $ctrl.ok = function() {
             // 如果是第一次触发就去总金额中减去
             if (money === 0 || money === undefined) {
                items.room.changeMaxMoney($ctrl.selected.money);
             } else {
                items.room.changeMaxMoney($ctrl.selected.money);
                items.room.room.maxMoney =  items.room.room.maxMoney + money;
             }
            
            $uibModalInstance.close($ctrl.selected);
        };

        $ctrl.cancel = function() {
            $uibModalInstance.dismiss('cancel');
        };
    }).
    /*
    由于整个应用都会跟路由打交道所以把$state和$stateParams这两个对象放在$rootscope上，
    方便其他地方注入和应用。这里的run方法只会在angular运行的时候执行一次
    */
run(function($rootScope, $state, $stateParams) {
    $rootScope.$state = $state;
    $rootScope.$stateParams = $stateParams;
});
