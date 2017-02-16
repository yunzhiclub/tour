<?php
namespace app\api\controller;
use think\Request;
use app\model\UserModel;

class UserController extends ApiController {
    private $UserModel;

    public function __construct(Request $request = null) {
        parent::__construct($request);

        // 获取用户传入的openid
        $openid = Request::instance()->param('openid');

        // 验证openid长度是否符合
        if (!UserModel::checkOpenidLength($openid)) {
            $this->response(20002);     // openid长度不正确
            return;
        }

        // 获取用户实体
        $UserModel = UserModel::getUserModelByOpenid($openid);
    }

    /**
     * 设置身份证号码
     * @param    integer                  $idCardNum [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T16:51:06+0800
     */
    public function setIDCardNumByOpenid($idCardNum = 0, $openid = '') {
        try {
            // 通过openid取用户模型（实体）信息
            $UserModel = UserModel::getUserModelByOpenid($openid);

            //判断实体信息是否存在
            if ('' === $UserModel->getData('openid')) {
                return $this->response(20003);
            }

            if ('' === $idCardNum) {
                return $this->response(20004, $UserModel->getError());
            }
            // 设置身份证号
            $UserModel->setData('id_card_num', $idCardNum);
            $data['id_card_num'] = $idCardNum;
            
            // 更新数据并进行验证
            if (false === $UserModel->validate(true)->save($data)) {
                // 报错：身份证号码格式不正确
                return $this->response(20004, $UserModel->getError());
            } else {
                // 成功设置，返回空数组
                return $this->response([]);
            }

        } catch (\Exception $e) {
            $this->exception($e);
        }
    }

    /**
     * 设置是否接收推送消息
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-21T18:56:09+0800
     */
    public function setIsReceiveMessageByOpenid($isReceiveMessage = 0, $openid = '') {
        try {
            // 通过openid取用户模型（实体）信息
            $UserModel = UserModel::getUserModelByOpenid($openid);

            //判断实体信息是否存在
            if ('' === $UserModel->getData('openid')) {
                return $this->response(20003);
            }

            // 设置推送消息            
            $UserModel->setData('is_receive_message', $isReceiveMessage);
            $data['is_receive_message'] = $isReceiveMessage;

            // 更新数据并进行验证
            $UserModel->save($data);

            // 成功设置，返回空数组
            return $this->response([]);

        } catch (\Exception $e) {
            $this->exception($e);
        }
    }


    /**
     * 获取用户基本信息
     * @return   [type]                   [description]
     * @author 梦云智 http://www.mengyunzhi.com
     * @DateTime 2016-12-22T10:13:54+0800
     */
    public function getUserByOpenid($openid) {
        try {
            // 获取用户实体
            $UserModel = UserModel::getUserModelByOpenid($openid);
            
            // 成功设置，返回空数组
            return $this->response($UserModel);

        } catch (\Exception $e) {
            $this->exception($e);
        }
    }
}
