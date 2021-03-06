<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:96:"/Users/soutensakai/Desktop/canyin/public/../application/admin/view/general/attachment/index.html";i:1585190149;s:76:"/Users/soutensakai/Desktop/canyin/application/admin/view/layout/default.html";i:1585210989;s:73:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/meta.html";i:1585190150;s:75:"/Users/soutensakai/Desktop/canyin/application/admin/view/common/script.html";i:1585190150;}*/ ?>
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
                                <div class="panel panel-default panel-intro">

    <div class="panel-heading">
        <?php echo build_heading(null,FALSE); ?>
        <ul class="nav nav-tabs" data-field="mimetype">
            <li class="active"><a href="#t-all" data-value="" data-toggle="tab"><?php echo __('All'); ?></a></li>
            <?php if(is_array($mimetypeList) || $mimetypeList instanceof \think\Collection || $mimetypeList instanceof \think\Paginator): if( count($mimetypeList)==0 ) : echo "" ;else: foreach($mimetypeList as $key=>$vo): ?>
            <li><a href="#t-<?php echo $key; ?>" data-value="<?php echo $key; ?>" data-toggle="tab"><?php echo $vo; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>

    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding">
                    <div id="toolbar" class="toolbar">
                        <?php echo build_toolbar('refresh,add,edit,del'); ?>
                    </div>
                    <table id="table" class="table table-striped table-bordered table-hover" width="100%">
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

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