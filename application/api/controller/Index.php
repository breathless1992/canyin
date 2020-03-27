<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\Db;
use app\common\controller\Utils;
/**
 * 首页接口
 */
class Index extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    /**
     * 首页
     *
     */
    public function index()
    {
        $this->success('请求成功');
    }

    public function  testdb(){
        $list=Db::connect('DB_CONFIG2')->table('t_basics_partner')->select();
        $data = ['data' => $list];
        $this->success('请求成功',$data);
    }

    //选配功能
    public function authAccount($partnerCode='100110',$xcxPlatform='0',$wxType='2',$phoneCashier='0',$enableAccount='1',$useCashier='1',$useYuding='1',$useWaimai='1',$useCoupon='1',$useVip='1'){
        $key=config('CANYIN_APIKEY');
        $data['xcxPlatform']=$xcxPlatform;//是否小程序平台版 0-否,1-是
        $data['enableAccount']=$enableAccount;//账号是否可用 0 不可用 1 可用
        $data['useCashier']=$useCashier;//是否可用 收银机（安卓 pc） 0 否 1 是
        $data['useHongbao']='0';//是否有红包 0 否 1 是
        $data['useWaimai']=$useWaimai;//是否有外卖 0 否 1 是
        $data['useCoupon']=$useCoupon;//是否有会员卡功能 0 否 1 是
        $data['useVip']=$useVip;
        $data['phoneCashier']=$phoneCashier;//是否手机收银0：否,1:是
        $data['wxType']=$wxType;//0:微信、小程序餐厅 1:展示版  2:小程序
        $data['useYuding']=$useYuding;//是否开启预订0:否 1:是
        //$data['partnerCode']=$partnerCode;//商家编号
        $dataArr=json_encode($data,JSON_UNESCAPED_UNICODE); //json字符串
        $key=config('CANYIN_APIKEY');
        $ts=time();//时间戳
        $sign=md5($partnerCode.$dataArr.$ts.$key);
        $newdata['partnerCode']=$partnerCode;//商家编号
        $newdata['sign']=$sign;
        $newdata['ts']=$ts;
        $newdata['data']=$dataArr;
        $curl=config('JAVASERVERURL')."/coral/partner/saveOther.do";
        $result=Utils::instance()->https_request($curl,$newdata);
        return $result;
       // $this->success($result);
    }


}
