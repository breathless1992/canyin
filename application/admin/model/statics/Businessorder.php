<?php

namespace app\admin\model\statics;

use think\Model;


class Businessorder extends Model
{

    protected $connection = 'DB_CONFIG2';

    // 表名
    protected $name = 'business_order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

}
