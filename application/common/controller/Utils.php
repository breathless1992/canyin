<?php
/**
 * Created by PhpStorm.
 * User: wangshu
 * Date: 2018/9/12
 * Time: 下午8:36
 */

namespace app\common\controller;

class Utils
{
    public static $instance; //用于缓存实例
    public static function instance() {
        //如果不存在实例，则返回实例
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //递归闭包查询
    public function closure(){
        return function ($query){
            $query->with(['child'=>$this->closure()]);
        };
    }

    //创建时间
    public function createTime(){
        return date("Y-m-d H:i");
    }


    //将XML转为array
    public function xmlToArray($xml)
    {
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $values;
    }


    //数组转xml
    function arrayToXml($arr){
        $xml = "<root>";
        foreach ($arr as $key=>$val){
            if(is_array($val)){
                $xml.="<".$key.">".arrayToXml($val)."</".$key.">";
            }else{
                $xml.="<".$key.">".$val."</".$key.">";
            }
        }
        $xml.="</root>";
        return $xml ;
    }
    //数组转XML
    function arrayToXml2($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;

    }

    //获取客户端请求ip
    public function getIp(){
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";
        return($ip);
    }

    //生成随机字符串
    public function getNonce_str(){
        $nonce_str=str_shuffle("AbCDeFgHiJfklMoPqRsTuvWxYz1234567890");//获取随机字符串
        $nonce_str=substr($nonce_str,0,30);//截取30位
        return $nonce_str;
    }

    //生成UUID
    public function createuuid(){
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        //$charid = strtoupper(md5(uniqid(rand(), true)));
        $charid =md5(uniqid(rand(), true));
        $hyphen = chr(45);// "-"
        $uuid = //chr(123)// "{"
            substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12);
        //.chr(125);// "}"
        return $uuid;
    }



    /**
     * https请求
     * @param $url
     * @param null $data
     * @return mixed
     */
    public function https_request($url,$data = null){
        $curl = curl_init();                                       //初始化
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);         //抓取URL地址
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);                 //以文件流方式输出
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);                             //执行
        curl_close($curl);                                     //关闭
        return $output;
    }
}