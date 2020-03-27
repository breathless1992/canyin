<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"/Users/soutensakai/Desktop/canyin/public/../application/index/view/index/index.html";i:1585190144;}*/ ?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $site['name']; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/index.css" rel="stylesheet">

        <!-- Plugin CSS -->
        <link href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.staticfile.org/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <h1>hello</h1>


     <div>
         <ul>
             <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
                <li><?php echo $user['title']; ?></li>
             <?php endforeach; endif; else: echo "" ;endif; ?>
         </ul>
     </div>
    <?php echo $list->render(); ?>

<!--    <a href="<?php echo addon_url('test/link'); ?>">link test</a>-->
<!--    <div><?php echo hook('testhook', ['id'=>1]); ?></div>-->

        <!-- jQuery -->
        <script src=https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>

</html>
