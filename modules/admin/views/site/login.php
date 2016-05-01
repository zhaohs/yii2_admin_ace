<?php
$host =  \Yii::$app->request->getHostInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - Ace Admin</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?=$host?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=$host?>/assets/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace-ie.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?=$host?>/assets/css/ace.onpage-help.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="<?=$host?>/assets/js/html5shiv.js"></script>
    <script src="<?=$host?>/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-layout">
<div class="main-container">
<div class="main-content">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-container">
<div class="center">
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <h4 class="blue" id="id-company-text">&copy; Company Name</h4>
</div>

<div class="space-6"></div>

<div class="position-relative">
    <div id="login-box" class="login-box visible widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">
                <h4 class="header blue lighter bigger">
                    <i class="ace-icon fa fa-coffee green"></i>
                    请输入用户名密码
                </h4>

                <div class="space-6"></div>

                <form action="/admin/site/login" method="post" enctype="multipart/form-data" id="login">
                    <fieldset>
                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="LoginForm[username]" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
                        </label>

                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="LoginForm[password]" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
                        </label>

                        <div class="space"></div>

                        <div class="clearfix">
                            <label class="inline">
                                <input type="checkbox" class="ace" />
                                <span class="lbl"> Remember Me</span>
                            </label>
                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary" onclick="submit()">
                                <i class="ace-icon fa fa-key"></i>
                                <span class="bigger-110">Login</span>
                            </button>

                        </div>

                        <div class="space-4"></div>
                    </fieldset>
                </form>


            </div><!-- /.widget-main -->


        </div><!-- /.widget-body -->
    </div><!-- /.login-box -->




</div><!-- /.position-relative -->

</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?=$host?>/assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?=$host?>/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?=$host?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">

    //you don't need this, just used for changing background
    jQuery(function($) {

            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');


    });

    function submit() {
        document.getElementById('login').submit();
    }
</script>
</body>
</html>
