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
  ])
  .config(['$stateProvider', '$urlRouterProvider', 'cfpLoadingBarProvider', function($stateProvider, $urlRouterProvider, cfpLoadingBarProvider) {
    // 设置LoadingBar HTML Loading模板
    cfpLoadingBarProvider.spinnerTemplate = '<div id="loadingToast" ng-show=""><div class="weui-mask_transparent"></div><div class="weui-toast"><i class="weui-loading weui-icon_toast"></i><p class="weui-toast__content">数据加载中</p></div></div>';
    $urlRouterProvider.otherwise('/home');
    $stateProvider
    .state('home', {
        url: '/home',      // 首页
        templateUrl: 'views/home.html',
        controller:'HomeCtrl',
    })
    .state('cities', {
        url: '/cities',     // 定位城市
        templateUrl: 'views/cities.html',
        controller:'CitiesCtrl',
    })
    .state('search', {
        url: '/search',     // 搜索界面
        templateUrl: 'views/search.html',
        controller:'SearchCtrl',
    })
     .state('invitedls', {
        url: '/invitedls',    // 邀约的列表
        templateUrl: 'views/invitedls.html',
        controller:'InvitedlsCtrl',
    })
     .state('ivdetail', {
        url: '/ivdetail',    // 趣约详情
        templateUrl: 'views/ivdetail.html',
        controller:'IvdetailCtrl',
    })
      .state('topay', {
        url: '/topay',     // 支付界面
        templateUrl: 'views/topay.html',
        controller:'TopayCtrl',
    })
       .state('paysuccess', {
        url: '/paysuccess',    // 支付成功界面
        templateUrl: 'views/paysuccess.html',
        controller:'PaysuccessCtrl',
    })
     .state('toinvite', {
        url: '/toinvite',   // 发布邀约的首页
        templateUrl: 'views/toinvite.html',
        controller:'ToinviteCtrl',
    })
     .state('choseroute', {
        url: '/choseroute',   // 选取路线的界面
        templateUrl: 'views/choseroute.html',
        controller:'ChoserouteCtrl',
    })
     .state('placelist', {
        url: '/placelist',   // 国家列表界面
        templateUrl: 'views/placelist.html',
        controller:'PlacelistCtrl',
    })
      .state('routes', {
        url: '/routes',      // 具体国家中的路线列表
        templateUrl: 'views/routes.html',
        controller:'RoutesCtrl',
    })
        .state('classic', {
        url: '/classic',      // 经典小团界面
        templateUrl: 'views/classic.html',
        controller:'ClassicCtrl',
    })
       .state('clsdetail', {
        url: '/clsdetail',     // 经典小团详情界面
        templateUrl: 'views/clsdetail.html',
        controller:'ClsdetailCtrl',
    })
        .state('sendtime', {
        url: '/sendtime',     // 选择出发日期
        templateUrl: 'views/sendtime.html',
        controller:'SendtimeCtrl',
    })
        .state('clsorder', {
        url: '/clsorder',      // 经典小团填写订单界面
        templateUrl: 'views/clsorder.html',
        controller:'ClsorderCtrl',
    })
         .state('visa', {
        url: '/visa',      // 签证页面
        templateUrl: 'views/visa.html',
        controller:'VisaCtrl',
    })
        .state('hourse', {
        url: '/hourse',   // 房间选择界面
        templateUrl: 'views/hourse.html',
        controller:'HourseCtrl',
    })
        .state('personal', {
        url: '/personal',       // 个人中心的页面
        templateUrl: 'views/personal.html',
        controller:'PersonalCtrl',
    })
         .state('changeps', {
        url: '/changeps',       // 个人信息修改页面
        templateUrl: 'views/changeps.html',
        controller:'ChangepsCtrl',
    })
        .state('orderls', {
        url: '/orderls',         // 全部订单列表页面
        templateUrl: 'views/orderls.html',
        controller:'OrderlsCtrl',
    })
        .state('orderdetail', {
        url: '/orderdetail',     // 订单详情页面
        templateUrl: 'views/orderdetail.html',
        controller:'OrderdetailCtrl',
    })
         .state('insurance', {
        url: '/insurance',         // 保险页面
        templateUrl: 'views/insurance.html',
        controller:'InsuranceCtrl',
    })
           .state('invoice', {
        url: '/invoice',         // 发票详情页面
        templateUrl: 'views/invoice.html',
        controller:'InvoiceCtrl',
    })
           .state('trlpeoples', {
        url: '/trlpeoples',         // 出游人详情页面
        templateUrl: 'views/trlpeoples.html',
        controller:'TrlpeoplesCtrl',
    })
        .state('paydetail', {
        url: '/paydetail',         // 支付详情页面
        templateUrl: 'views/paydetail.html',
        controller:'PaydetailCtrl',
    })
         .state('evaluate', {
        url: '/evaluate',         // 评价页面
        templateUrl: 'views/evaluate.html',
        controller:'EvaluateCtrl',
    })
           .state('collectionls', {
        url: '/collectionls',       // 收藏列表
        templateUrl: 'views/collectionls.html',
        controller:'CollectionlsCtrl',
    })
        .state('touristls', {
        url: '/touristls',       // 游客列表
        templateUrl: 'views/touristls.html',
        controller:'TouristlsCtrl',
    })
        .state('addtourist', {
        url: '/addtourist',       // 新增游客页面
        templateUrl: 'views/addtourist.html',
        controller:'AddtouristCtrl',
    });
    
}]).
/*
由于整个应用都会跟路由打交道所以把$state和$stateParams这两个对象放在$rootscope上，
方便其他地方注入和应用。这里的run方法只会在angular运行的时候执行一次
*/
run(function($rootScope, $state, $stateParams) {
  $rootScope.$state = $state;
  $rootScope.$stateParams = $stateParams;
});
