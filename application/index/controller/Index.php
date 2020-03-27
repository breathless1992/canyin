<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use app\admin\model\xshop\Hook ;
use think\Db;
class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $list=Db::name('test_bbs')->paginate(10);
        $this->assign('list',$list);
        //调用插件
       // Hook::listen("testhook",$this->request);

        return $this->view->fetch();
    }

}
