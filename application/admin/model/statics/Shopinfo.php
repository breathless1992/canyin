<?php

namespace app\admin\model\statics;

use think\Model;


class Shopinfo extends Model
{

    

    protected $connection = 'DB_CONFIG2';

    // 表名
    protected $name = 'shop_receivables';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

    







}
