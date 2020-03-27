<?php

namespace app\admin\model\statics;

use think\Model;


class Partner extends Model
{

    

    protected $connection = 'DB_CONFIG2';

    // 表名
    protected $name = 'basics_partner';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'c_start_time_text',
        'c_end_time_text'
    ];
    

    



    public function getCStartTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['c_start_time']) ? $data['c_start_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getCEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['c_end_time']) ? $data['c_end_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setCStartTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }

    protected function setCEndTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
