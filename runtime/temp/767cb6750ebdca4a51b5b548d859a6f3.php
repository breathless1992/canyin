<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"/Users/soutensakai/Desktop/canyin/public/../application/admin/view/auth/rule/edit.html";i:1585190150;s:76:"/Users/soutensakai/Desktop/canyin/application/admin/view/layout/default.html";i:1585210989;s:73:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/meta.html";i:1585190150;s:75:"/Users/soutensakai/Desktop/canyin/application/admin/view/auth/rule/tpl.html";i:1585190150;s:75:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/script.html";i:1585190150;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal form-ajax" role="form" method="POST" action="">
    <?php echo token(); ?>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Ismenu'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[ismenu]', ['1'=>__('Yes'), '0'=>__('No')], $row['ismenu']); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Parent'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_select('row[pid]', $ruledata, $row['pid'], ['class'=>'form-control', 'required'=>'']); ?>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="control-label col-xs-12 col-sm-2"><?php echo __('Name'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="name" name="row[name]" data-placeholder-node="<?php echo __('Node tips'); ?>" data-placeholder-menu="<?php echo __('Menu tips'); ?>" value="<?php echo htmlentities($row['name']); ?>" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="title" name="row[title]" value="<?php echo htmlentities($row['title']); ?>" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="icon" class="control-label col-xs-12 col-sm-2"><?php echo __('Icon'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group input-groupp-md">
                <input type="text" class="form-control" id="icon" name="row[icon]" value="<?php echo $row['icon']; ?>" />
                <a href="javascript:;" class="btn-search-icon input-group-addon"><?php echo __('Search icon'); ?></a>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="weigh" class="control-label col-xs-12 col-sm-2"><?php echo __('Weigh'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input type="text" class="form-control" id="weigh" name="row[weigh]" value="<?php echo $row['weigh']; ?>" data-rule="required" />
        </div>
    </div>
    <div class="form-group">
        <label for="remark" class="control-label col-xs-12 col-sm-2"><?php echo __('Condition'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea class="form-control" id="condition" name="row[condition]"><?php echo htmlentities($row['condition']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="remark" class="control-label col-xs-12 col-sm-2"><?php echo __('Remark'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea class="form-control" id="remark" name="row[remark]"><?php echo htmlentities($row['remark']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <?php echo build_radios('row[status]', ['normal'=>__('Normal'), 'hidden'=>__('Hidden')], $row['status']); ?>
        </div>
    </div>
    <div class="form-group hidden layer-footer">
        <div class="col-xs-2"></div>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>
<style>
    #chooseicon {
        margin:10px;
    }
    #chooseicon ul {
        margin:5px 0 0 0;
    }
    #chooseicon ul li{
        width:41px;height:42px;
        line-height:42px;
        border:1px solid #efefef;
        padding:1px;
        margin:1px;
        text-align: center;
        font-size:18px;
    }
    #chooseicon ul li:hover{
        border:1px solid #2c3e50;
        cursor:pointer;
    }
</style>
<script id="chooseicontpl" type="text/html">
    <div id="chooseicon">
        <div>
            <form onsubmit="return false;">
                <div class="input-group input-groupp-md">
                    <div class="input-group-addon"><?php echo __('Search icon'); ?></div>
                    <input class="js-icon-search form-control" type="text" placeholder="">
                </div>
            </form>
        </div>
        <div>
            <ul class="list-inline">
                <% for(var i=0; i<iconlist.length; i++){ %>
                    <li data-font="<%=iconlist[i]%>" data-toggle="tooltip" title="<%=iconlist[i]%>">
                    <i class="fa fa-<%=iconlist[i]%>"></i>
                </li>
                <% } %>
            </ul>
        </div>

    </div>
</script>
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