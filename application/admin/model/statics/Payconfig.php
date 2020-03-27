<?php

namespace app\admin\model\statics;

use think\Model;


class Payconfig extends Model
{

    

    protected $connection = 'DB_CONFIG2';

    // 表名
    protected $name = 'payment_config';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

    







    public function basicspartner()
    {
        return $this->belongsTo('app\admin\model\BasicsPartner', 'c_partner_code', 'c_code', [], 'LEFT')->setEagerlyType(0);
    }
}
