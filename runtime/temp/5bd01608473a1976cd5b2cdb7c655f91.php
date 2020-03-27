<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:92:"/Users/soutensakai/Desktop/canyin/public/../application/admin/view/statics/partner/edit.html";i:1585190152;s:76:"/Users/soutensakai/Desktop/canyin/application/admin/view/layout/default.html";i:1585210989;s:73:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/meta.html";i:1585190150;s:75:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/script.html";i:1585190150;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
        <style>
            #preview-img{
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                z-index: 99999;
                background-color: rgba(0,0,0,0.6);
            }

            #preview-img #img-wrapper{
                position: absolute;
                top: 5%;
                left: 10%;
                right: 10%;
                bottom: 5%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-content: center;
            }

            #preview-img #img-wrapper img{
                width: 80%;
                height: 80%;
                object-fit: contain;
            }

            #preview-img .close-btn{
                position: fixed;
                top: -64px;
                right: -64px;
                padding-top: 64px;
                padding-right: 64px;
                box-sizing: border-box;
                background-color: white;
                width: 128px;
                height:128px;
                border-bottom-left-radius: 50%;
            }

            .close-btn .icon{
                position: fixed;
                right: 8px;
                top: 8px;
                width: 32px;
                height: 32px;
            }
        </style>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !\think\Config::get('fastadmin.multiplenav')): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
<!--                                <ol class="breadcrumb pull-left">-->
<!--                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>-->
<!--                                </ol>-->
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">


    <div class="form-group" >
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_code'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_code" data-rule="required" class="form-control" name="row[c_code]" type="text" value="<?php echo htmlentities($row['c_code']); ?>" readonly>
        </div>
    </div>
    <div class="form-group" >
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_name" class="form-control" name="row[c_name]" type="text" value="<?php echo htmlentities($row['c_name']); ?>" >
        </div>
    </div>



<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_jpush_id'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_jpush_id" data-rule="required" data-source="c/jpush/index" class="form-control selectpage" name="row[c_jpush_id]" type="text" value="<?php echo htmlentities($row['c_jpush_id']); ?>">-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_sms_num'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_sms_num" class="form-control" name="row[c_sms_num]" type="number" value="<?php echo htmlentities($row['c_sms_num']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否平台版</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_xcx_platform" name="row[c_xcx_platform]" type="hidden" value="<?php echo htmlentities($row['c_xcx_platform']); ?>">
            <a id="platform_toggle" href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_xcx_platform" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_xcx_platform'] == 'row[c_xcx_platform]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>

<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_phone_cashier'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_phone_cashier" class="form-control" name="row[c_phone_cashier]" type="number" value="<?php echo htmlentities($row['c_phone_cashier']); ?>">-->
<!--        </div>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2">小程序外卖接单</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c_phone_cashier" data-rule="required" data-source="category/selectpage" class="form-control selectpage" name="row[c_phone_cashier]" type="text" value="是">-->
<!--        </div>-->
<!--    </div>-->

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">小程序外卖接单</label>
        <div class="col-xs-12 col-sm-8">
            <select  class="form-control"  id="c_phone_cashier" data-rule="required" name="row[c_phone_cashier]" type="text"  >
                <option value="1">APP接单</option>
                <option value="0">收银机接单</option>
            </select>
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2">小程序外卖接单</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_phone_cashier" class="form-control" name="row[c_phone_cashier]" type="number" value="<?php echo $row['c_phone_cashier']; ?>">-->
<!--        </div>-->
<!--    </div>-->
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否允许收银</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_use_cashier" name="row[c_use_cashier]" type="hidden" value="0">
            <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_use_cashier" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_use_cashier'] == 'row[c_use_cashier]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>



<!--    <div class="form-group" id="cashier_hidden" style="display: none;">-->
<!--        <label class="control-label col-xs-12 col-sm-2">收银机类型</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <select  class="form-control"  id="c_cashier_type" data-rule="required" name="row[c_cashier_type]" type="text" >-->
<!--                <option value="6">PC</option>-->
<!--                <option value="0">安卓</option>-->
<!--            </select>-->
<!--        </div>-->
<!--    </div>-->



    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">微信餐厅类型</label>
        <div class="col-xs-12 col-sm-8" style="margin-left:-20px">
<!--            <input id="c-c_wx_type" class="form-control" name="row[c_wx_type]" type="number" value="<?php echo htmlentities($row['c_wx_type']); ?>">-->
            <label class="checkbox-inline">
                <input name="row[c_wx_type]" type="radio" id="c_wx_type1" value="0" > &nbsp微信及小程序餐厅
            </label>
            <label class="checkbox-inline">
                <input name="row[c_wx_type]" type="radio" id="c_wx_type2" value="1">  &nbsp小程序展示
            </label>
            <label class="checkbox-inline">
                <input name="row[c_wx_type]" type="radio" id="c_wx_type3" value="2">  &nbsp小程序餐厅
            </label>
        </div>
    </div>
<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_pay_version'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_pay_version" class="form-control" name="row[c_pay_version]" type="number" value="<?php echo htmlentities($row['c_pay_version']); ?>">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_is_shop'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_is_shop" class="form-control" name="row[c_is_shop]" type="number" value="<?php echo htmlentities($row['c_is_shop']); ?>">-->
<!--        </div>-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_business_type'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_business_type" class="form-control" name="row[c_business_type]" type="number" value="<?php echo htmlentities($row['c_business_type']); ?>">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_device_id'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_device_id" data-rule="required" data-source="c/device/index" class="form-control selectpage" name="row[c_device_id]" type="text" value="<?php echo htmlentities($row['c_device_id']); ?>">-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label class="control-label col-xs-12 col-sm-2"><?php echo __('C_login_state'); ?>:</label>-->
<!--        <div class="col-xs-12 col-sm-8">-->
<!--            <input id="c-c_login_state" class="form-control" name="row[c_login_state]" type="number" value="<?php echo htmlentities($row['c_login_state']); ?>">-->
<!--        </div>-->
<!--    </div>-->

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否有外卖</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_use_waimai" name="row[c_use_waimai]" type="hidden" value="1">
            <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_use_waimai" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_use_waimai'] == 'row[c_use_waimai]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否有预定</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_use_yuding" name="row[c_use_yuding]" type="hidden" value="1">
            <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_use_yuding" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_use_yuding'] == 'row[c_use_yuding]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否有优惠券</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_use_coupon" name="row[c_use_coupon]" type="hidden" value="0">
            <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_use_coupon" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_use_coupon'] == 'row[c_use_coupon]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">是否有会员卡</label>
        <div class="col-xs-12 col-sm-8">
            <input  id="c_use_vip" name="row[c_use_vip]" type="hidden" value="0">
            <a href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_use_vip" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_use_vip'] == 'row[c_use_coupon]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">激活停用账号</label>
        <div class="col-xs-12 col-sm-8">
            <input type="hidden" id="c_enable_account" name="row[c_enable_account]" value="0">
            <a id="enable_account" href="javascript:;" data-toggle="switcher" class="btn-switcher" data-input-id="c_enable_account" data-yes="1" data-no="0" >
                <i class="fa fa-toggle-on text-success <?php if($row['c_enable_account'] == 'row[c_enable_account]'): ?>fa-flip-horizontal text-gray<?php endif; ?> fa-2x"></i>
            </a><span id="accountstatus" style="margin-left:12px;" value=""></span>
        </div>
    </div>

    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--图片预览-->
        <div id="preview-img" style="display: none;">
            <div id="img-wrapper">
                <img id="img-preview" src=""/>
            </div>
            <div class="close-btn" onclick="closePreview()">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 1024 1024" width="64" height="64" t="1585127807595" p-id="508" version="1.1"><path fill="#000000" d="M 510.331 403.039 l 375.467 -375.467 a 75.6622 75.6622 0 0 1 107.255 0 a 75.7001 75.7001 0 0 1 0 107.33 l -375.467 375.429 l 375.467 375.467 c 29.5822 29.5822 29.8098 77.4068 0 107.255 a 75.7001 75.7001 0 0 1 -107.255 0 l -375.467 -375.467 l -375.467 375.467 c -29.5822 29.5822 -77.4447 29.8098 -107.255 0 a 75.7001 75.7001 0 0 1 0 -107.255 l 375.467 -375.467 l -375.467 -375.467 a 75.6622 75.6622 0 0 1 0 -107.255 a 75.7001 75.7001 0 0 1 107.255 0 l 375.467 375.467 Z" p-id="509" /></svg>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo htmlentities($site['version']); ?>"></script>

        <script>
            function closePreview(){
                console.log($("#preview-img"));
                $("#preview-img").css("display","none");
                $("#img-preview").attr("src",null);
            }

            function showPreviewImg(url){
                $("#preview-img").css("display","block");
                $("#img-preview").attr("src",url);
            }
        </script>
    </body>
</html>