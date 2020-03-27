<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"/Users/soutensakai/Desktop/canyin/public/../application/admin/view/statics/shopinfo/edit.html";i:1585211342;s:76:"/Users/soutensakai/Desktop/canyin/application/admin/view/layout/default.html";i:1585210989;s:73:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/meta.html";i:1585190150;s:75:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/script.html";i:1585190150;}*/ ?>
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

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">审核状态</label>
        <div class="col-xs-12 col-sm-8" style="margin-left:-20px">
            <label class="checkbox-inline">
                <input name="row[c_state]" type="radio" id="c_wx_type1" value="0" > &nbsp未审核
            </label>
            <label class="checkbox-inline">
                <input name="row[c_state]" type="radio" id="c_wx_type2" value="1">  &nbsp审核中
            </label>
            <label class="checkbox-inline">
                <input name="row[c_state]" type="radio" id="c_wx_type3" value="2">  &nbsp已审核
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">商户编号</label>
        <div class="col-xs-12 col-sm-8">
            <input readonly id="c-c_partner_code" class="form-control" name="row[c_partner_code]" type="text" value="<?php echo htmlentities($row['c_partner_code']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">商户名称</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_merchant_name" class="form-control" name="row[c_merchant_name]" type="text" value="<?php echo htmlentities($row['c_merchant_name']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">商户简称</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_short_name" class="form-control" name="row[c_short_name]" type="text" value="<?php echo htmlentities($row['c_short_name']); ?>">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">手机号</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_tel" class="form-control" name="row[c_tel]" type="text" value="<?php echo htmlentities($row['c_tel']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">客服电话</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_service_phone" class="form-control" name="row[c_service_phone]" type="text" value="<?php echo htmlentities($row['c_service_phone']); ?>">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">账号类型</label>
        <div class="col-xs-12 col-sm-8">
            <select  class="form-control"  id="c_account_type" data-rule="required" name="row[c_account_type]" type="text"  >
                <option value="0">个人账号</option>
                <option value="1">公司账号</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">开户人姓名</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_name" class="form-control" name="row[c_name]" type="text" value="<?php echo htmlentities($row['c_name']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">开户银行</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_bank" class="form-control" name="row[c_bank]" type="text" value="<?php echo htmlentities($row['c_bank']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">银行账号</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_bank_code" class="form-control" name="row[c_bank_code]" type="text" value="<?php echo htmlentities($row['c_bank_code']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">申请反馈邮箱</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_feedback_email" class="form-control" name="row[c_feedback_email]" type="text" value="<?php echo htmlentities($row['c_feedback_email']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">支付宝账号</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_alipay_no" class="form-control" name="row[c_alipay_no]" type="text" value="<?php echo htmlentities($row['c_alipay_no']); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2">法人身份证号</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-c_id_card_no" class="form-control" name="row[c_id_card_no]" type="text" value="<?php echo htmlentities($row['c_id_card_no']); ?>">
        </div>
    </div>




    <div class="form-group">
        <label for="c-c_id_card_img_f" class="control-label col-xs-12 col-sm-2">身份证正面</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_id_card_img_f" data-rule="" class="form-control" size="100" name="row[c_id_card_img_f]" type="text" value="<?php echo $row['c_id_card_img_f']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_id_card_img_f" class="btn btn-danger plupload" data-input-id="c-c_id_card_img_f" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_id_card_img_f"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_id_card_img_f" class="btn btn-primary fachoose" data-input-id="c-c_id_card_img_f" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-c_id_card_img_f"></span>
            </div>
            <ul   class="row list-inline plupload-preview" id="p-c_id_card_img_f"></ul>
        </div>
    </div>


    <div class="form-group">
        <label for="c-c_id_card_b_img" class="control-label col-xs-12 col-sm-2">身份证背面</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_id_card_b_img" data-rule="" class="form-control" size="100" name="row[c_id_card_b_img]" type="text" value="<?php echo $row['c_id_card_b_img']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_id_card_b_img" class="btn btn-danger plupload" data-input-id="c-c_id_card_b_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_id_card_b_img"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_id_card_b_img" class="btn btn-primary fachoose" data-input-id="c-c_id_card_b_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-c_id_card_b_img"></span>
            </div>
            <ul   class="row list-inline plupload-preview" id="p-c_id_card_b_img"></ul>
        </div>
    </div>



    <div class="form-group">
    <label for="c-c_license_img" class="control-label col-xs-12 col-sm-2">营业执照照片</label>
    <div class="col-xs-12 col-sm-8" >
        <div class="input-group">
            <input  id="c-c_license_img" data-rule="" class="form-control" size="100" name="row[c_license_img]" type="text" value="<?php echo $row['c_license_img']; ?>">
            <div class="input-group-addon no-border no-padding">
                <span><button type="button" id="plupload-c_license_img" class="btn btn-danger plupload" data-input-id="c-c_license_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_license_img"><i class="fa fa-upload"></i> 上传</button></span>
                <span><button type="button" id="fachoose-c_license_img" class="btn btn-primary fachoose" data-input-id="c-c_license_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
            </div>
            <span class="msg-box n-right" for="c-c_license_img"></span>
        </div>
        <ul   class="row list-inline plupload-preview" id="p-c_license_img"></ul>
    </div>
</div>

    <div class="form-group">
        <label for="c-c_store_quanjing_img" class="control-label col-xs-12 col-sm-2">店内全景图</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_store_quanjing_img" data-rule="" class="form-control" size="100" name="row[c_store_quanjing_img]" type="text" value="<?php echo $row['c_store_quanjing_img']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_store_quanjing_img" class="btn btn-danger plupload" data-input-id="c-c_store_quanjing_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_store_quanjing_img"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_store_quanjing_img" class="btn btn-primary fachoose" data-input-id="c-c_store_quanjing_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-c_store_quanjing_img"></span>
            </div>
            <ul   class="row list-inline plupload-preview" id="p-c_store_quanjing_img"></ul>
        </div>
    </div>

    <div class="form-group">
        <label for="c-c_store_shouyintai_img" class="control-label col-xs-12 col-sm-2">收银台照片</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_store_shouyintai_img" data-rule="" class="form-control" size="100" name="row[c_store_shouyintai_img]" type="text" value="<?php echo $row['c_store_shouyintai_img']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_store_shouyintai_img" class="btn btn-danger plupload" data-input-id="c-c_store_shouyintai_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_store_shouyintai_img"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_store_shouyintai_img" class="btn btn-primary fachoose" data-input-id="c-c_store_shouyintai_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-avatar"></span>
            </div>
            <ul   class="row list-inline plupload-preview" id="p-c_store_shouyintai_img"></ul>
        </div>
    </div>

    <div class="form-group">
        <label for="c-c_store_zhaopai_img" class="control-label col-xs-12 col-sm-2">店铺招牌照片</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_store_zhaopai_img" data-rule="" class="form-control" size="100" name="row[c_store_zhaopai_img]" type="text" value="<?php echo $row['c_store_zhaopai_img']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_store_zhaopai_img" class="btn btn-danger plupload" data-input-id="c-c_store_zhaopai_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_store_zhaopai_img"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_store_zhaopai_img" class="btn btn-primary fachoose" data-input-id="c-c_store_zhaopai_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-c_store_zhaopai_img"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-c_store_zhaopai_img"></ul>
        </div>
    </div>


    <div class="form-group">
        <label for="c-c_service_permit_img" class="control-label col-xs-12 col-sm-2">餐饮服务许可证</label>
        <div class="col-xs-12 col-sm-8" >
            <div class="input-group">
                <input  id="c-c_service_permit_img" data-rule="" class="form-control" size="100" name="row[c_service_permit_img]" type="text" value="<?php echo $row['c_service_permit_img']; ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-c_service_permit_img" class="btn btn-danger plupload" data-input-id="c-c_service_permit_img" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-c_service_permit_img"><i class="fa fa-upload"></i> 上传</button></span>
                    <span><button type="button" id="fachoose-c_service_permit_img" class="btn btn-primary fachoose" data-input-id="c-c_service_permit_img" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> 选择</button></span>
                </div>
                <span class="msg-box n-right" for="c-avatar"></span>
            </div>
            <ul   class="row list-inline plupload-preview" id="p-c_service_permit_img"></ul>
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