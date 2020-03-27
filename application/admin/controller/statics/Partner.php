<?php

namespace app\admin\controller\statics;

use app\common\controller\Backend;
use app\common\controller\Utils;


/**
 *
 *
 * @icon fa fa-circle-o
 */
class Partner extends Backend
{

    /**
     * Partner模型对象
     * @var \app\admin\model\statics\Partner
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\statics\Partner;

    }
    /**
     * 查看
     */
    public function index()
    {
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
                ->order(['c_code' => 'desc'])
                ->limit($offset, $limit)
                ->select();
            foreach ($list as $k => $v) {
                $v['c_phone_cashier'] = $v['c_phone_cashier'] == '0' ? '收银机接单' : 'APP接单'; //是否手机收银 0 否 1 是
                $v['c_use_cashier'] = $v['c_use_cashier'] == '0' ? '否' : '是'; //是否能收银 0 否 1 是
                $v['c_cashier_type'] = $v['c_cashier_type'] == '6' ? 'PC' : '安卓'; //收银机类型0-安卓版，6-PC版
                if ($v['c_wx_type'] == '0') {
                    $v['c_wx_type'] = '微信及小程序餐厅';
                }
                if ($v['c_wx_type'] == '1') {
                    $v['c_wx_type'] = '展示版小程序';
                }
                if ($v['c_wx_type'] == '2') {
                    $v['c_wx_type'] = '小程序餐厅';
                }
                $v['c_xcx_platform'] = $v['c_xcx_platform'] == '0' ? '独立版' : '平台版';//是否小程序平台版 0-否,1-是
                $v['c_login_state'] = $v['c_login_state'] == '0' ? '未登录' : '已登录';//收银机登录状态0-未登录，1-登录
                $v['c_use_waimai'] = $v['c_use_waimai'] == '0' ? '否' : '是';//是否有外卖 0 否 1 是
                $v['c_use_yuding'] = $v['c_use_yuding'] == '0' ? '否' : '是';//是否有预订 0 否 1 是
                $v['c_use_coupon'] = $v['c_use_coupon'] == '0' ? '否' : '是';//是否有优惠券 0 否 1 是
                $v['c_use_vip'] = $v['c_use_vip'] == '0' ? '否' : '是';//是否有会员卡功能 0 否 1 是
                $v['c_enable_account'] = $v['c_enable_account'] == '0' ? '已停用' : '已激活';//账号是否可用 0 不可用 1 可用
            }
            $result = array("total" => $total, "rows" => $list);
            return json($result);
        }

        return $this->view->fetch();
    }


    /**
     * 编辑
     */
    public function edit($ids = null)
    {
        $row = $this->model->get($ids);
        if (!$row) {
            $this->error(__('No Results were found'));
        }
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);
                $partnerCode = $params['c_code'];
                $xcxPlatform = $params['c_xcx_platform'];
                $wxType = $params['c_wx_type'];
                $phoneCashier = $params['c_phone_cashier'];
                $enableAccount = $params['c_enable_account'];
                $useCashier = $params['c_use_cashier'];
                $useYuding = $params['c_use_yuding'];
                $useWaimai = $params['c_use_waimai'];
                $useCoupon = $params['c_use_coupon'];
                $useVip = $params['c_use_vip'];
                //调用接口配置
                self::authAccount($partnerCode, $xcxPlatform, $wxType, $phoneCashier, $enableAccount, $useCashier, $useYuding, $useWaimai, $useCoupon, $useVip);
                $this->success();
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        $this->assignconfig("row", $row);
        return $this->view->fetch();
    }

    /**
     * 添加
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                $params = $this->preExcludeFields($params);
                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                //1、新增账号
                $storename = $params['c_name'];
                $contacts = $params['c_contacts'];
                $tel = $params['c_phone'];
                $wxType = $params['c_wx_type'];
                $xcxPlatform = $params['c_xcx_platform'];
                $cashierType = $params['c_cashier_type'];
                $phoneCashier = $params['c_phone_cashier'];
                $useCashier = $params['c_use_cashier'];
                $useYuding = $params['c_use_yuding'];
                $useWaimai = $params['c_use_waimai'];
                $useCoupon = $params['c_use_coupon'];
                $useVip = $params['c_use_vip'];
                $enableAccount = 1;//新开通默认账号可用
                $result = self::addAccount($storename, $contacts, $tel, $wxType, $xcxPlatform, $phoneCashier, $useCashier, $cashierType, $useYuding, $useWaimai, $useCoupon, $useVip);
                $dataObj = json_decode($result);//转换成json对象，加true则为数组
                //2、初始化账号权限
                if ($dataObj->code == 0) {
                    $partnerCode = $dataObj->data->code;//商家编号
                    //调用接口配置
                    //$result=self::authAccount($partnerCode,$xcxPlatform,$wxType,$phoneCashier,$enableAccount,$useCashier,$useYuding,$useWaimai,$useCoupon,$useVip);
                    $this->model
                        ->where('c_code', $partnerCode)
                        ->update(['c_enable_account' => '1']);
                    $this->success();
                } else {
                    $this->error('新增账号失败');
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

    //生成账号
    private function addAccount($storename, $contacts, $tel, $wxtype, $xcxPlatform, $phoneCashier, $useCashier, $cashierType, $useYuding, $useWaimai, $useCoupon, $useVip)
    {
        $data['name'] = $storename;
        $data['contacts'] = $contacts;
        $data['phone'] = $tel;
        $data['payversion'] = '1';//0：免费版，1：付费版
        $cash_pass = '666666';
        $data['password'] = md5($cash_pass);//收银端初始化密码
        $admin_pass = '666666';
        $data['adminPassword'] = md5($admin_pass);//超级管理员初始化密码
        $data['xcxPlatform'] = $xcxPlatform;
        $data['cashierType'] = $cashierType;//默认PC版收银
        $data['enableAccount'] = 1;//账号是否可用0：否 1：是
        $data['isShop'] = '1';//是否店中店0：否 1：时
        $data['wxType'] = $wxtype;//微信端版本：0-微信餐厅 1-小程序最简版 2-小程序外卖版
        $data['phoneCashier'] = $phoneCashier;
        $data['useCashier'] = $useCashier;
        $data['useCoupon'] = $useCoupon;
        $data['useVip'] = $useVip;
        $data['useWaimai'] = $useWaimai;
        $data['useYuding'] = $useYuding;
        $dataArr = json_encode($data, JSON_UNESCAPED_UNICODE); //json字符串
        $ts = time();//时间戳
        $sign = md5($dataArr . $ts . config('CANYIN_APIKEY'));
        $newdata['data'] = $dataArr;
        $newdata['ts'] = $ts;
        $newdata['sign'] = $sign;
        $curl = config('JAVASERVERURL') . "/coral/partner/initAll.do";
        $result = Utils::instance()->https_request($curl, $newdata);
        return $result;
    }

//选配功能
    private function authAccount($partnerCode, $xcxPlatform, $wxType, $phoneCashier, $enableAccount, $useCashier, $useYuding, $useWaimai, $useCoupon, $useVip)
    {
        $key = config('CANYIN_APIKEY');
        $data['xcxPlatform'] = $xcxPlatform;//是否小程序平台版 0-否,1-是
        $data['enableAccount'] = $enableAccount;//账号是否可用 0 不可用 1 可用
        $data['useCashier'] = $useCashier;//是否可用 收银机（安卓 pc） 0 否 1 是
        $data['useHongbao'] = '0';//是否有红包 0 否 1 是
        $data['useWaimai'] = $useWaimai;//是否有外卖 0 否 1 是
        $data['useCoupon'] = $useCoupon;//是否有会员卡功能 0 否 1 是
        $data['useVip'] = $useVip;
        $data['phoneCashier'] = $phoneCashier;//是否手机收银0：否,1:是
        $data['wxType'] = $wxType;//0:微信、小程序餐厅 1:展示版  2:小程序
        $data['useYuding'] = $useYuding;//是否开启预订0:否 1:是
        //$data['partnerCode']=$partnerCode;//商家编号
        $dataArr = json_encode($data, JSON_UNESCAPED_UNICODE); //json字符串
        $key = config('CANYIN_APIKEY');
        $ts = time();//时间戳
        $sign = md5($partnerCode . $dataArr . $ts . $key);
        $newdata['partnerCode'] = $partnerCode;//商家编号
        $newdata['sign'] = $sign;
        $newdata['ts'] = $ts;
        $newdata['data'] = $dataArr;
        $curl = config('JAVASERVERURL') . "/coral/partner/saveOther.do";
        $result = Utils::instance()->https_request($curl, $newdata);
        return $result;
    }


    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */

}
