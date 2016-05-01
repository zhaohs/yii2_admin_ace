<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$host =  \Yii::$app->request->getHostInfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?= Html::encode($this->title) ?></title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?=$host?>/statics/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=$host?>/statics/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-fonts.css" />
    <link rel="stylesheet" href="<?=$host?>/statics/css/jquery-ui.min.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace.min.css" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-ie.min.css" />


    	<link rel="stylesheet" href="../statics/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../statics/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->


    <!-- text fonts -->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?=$host?>/statics/css/ace-ie.min.css" />
    <![endif]-->

    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?=$host?>/statics/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="<?=$host?>/statics/js/html5shiv.min.js"></script>
    <script src="<?=$host?>/statics/js/respond.min.js"></script>
    <![endif]-->
    <style>

    </style>
</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
<script type="text/javascript">
    try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>

<div class="navbar-container" id="navbar-container">
<!-- #section:basics/sidebar.mobile.toggle -->
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
    <span class="sr-only">Toggle sidebar</span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>

    <span class="icon-bar"></span>
</button>

<!-- /section:basics/sidebar.mobile.toggle -->
<div class="navbar-header pull-left">
    <!-- #section:basics/navbar.layout.brand -->
    <a href="#" class="navbar-brand">
        <small>
            <i class="fa fa-leaf"></i>
            后台管理系统
        </small>
    </a>

    <!-- /section:basics/navbar.layout.brand -->

    <!-- #section:basics/navbar.toggle -->

    <!-- /section:basics/navbar.toggle -->
</div>

<!-- #section:basics/navbar.dropdown -->
<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav">


<!-- #section:basics/navbar.user_menu -->
<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="<?=$host?>/statics/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>欢迎您,</small>
									<?= \Yii::$app->user->getIdentity()->username ?>
								</span>

        <i class="ace-icon fa fa-caret-down"></i>
    </a>

    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

        <li>
            <a href="/admin/site/logout">
                <i class="ace-icon fa fa-power-off"></i>
                Logout
            </a>
        </li>
    </ul>
</li>

<!-- /section:basics/navbar.user_menu -->
</ul>
</div>

<!-- /section:basics/navbar.dropdown -->
</div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar                  responsive">
<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
    <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
        <button class="btn btn-success">
            <i class="ace-icon fa fa-signal"></i>
        </button>

        <button class="btn btn-info">
            <i class="ace-icon fa fa-pencil"></i>
        </button>

        <!-- #section:basics/sidebar.layout.shortcuts -->
        <button class="btn btn-warning">
            <i class="ace-icon fa fa-users"></i>
        </button>

        <button class="btn btn-danger">
            <i class="ace-icon fa fa-cogs"></i>
        </button>

        <!-- /section:basics/sidebar.layout.shortcuts -->
    </div>

    <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
        <span class="btn btn-success"></span>

        <span class="btn btn-info"></span>

        <span class="btn btn-warning"></span>

        <span class="btn btn-danger"></span>
    </div>
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
<li class="active">
    <a href="/admin/site/index">
        <i class="menu-icon fa fa-tachometer"></i>
        <span class="menu-text"> 控制台 </span>
    </a>

    <b class="arrow"></b>
</li>

    <?php
    echo \app\modules\menu\models\Menu::getMenuHtml('admin', 0)
    ?>

</ul><!-- /.nav-list -->

<!-- #section:basics/sidebar.layout.minimize -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<!-- /section:basics/sidebar.layout.minimize -->
<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>

<!-- /section:basics/sidebar -->
<div class="main-content">
<!-- #section:basics/content.breadcrumbs -->
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
    </script>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <!-- #section:basics/content.searchbox -->
    <div class="nav-search" id="nav-search">
        <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
        </form>
    </div><!-- /.nav-search -->

    <!-- /section:basics/content.searchbox -->
</div>

<!-- /section:basics/content.breadcrumbs -->
<div class="page-content">
<div class="page-content-area">
<div class="page-header">

</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>

    Welcome to
    <strong class="green">
        Ace
        <small>(v1.3.1)</small>
    </strong>,
    the lightweight, feature-rich and easy to use admin template.
</div>

<?= $content ?>



<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content-area -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->

<div class="footer">
    <div class="footer-inner">
        <!-- #section:basics/footer -->
        <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

            &nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
						</span>
        </div>

        <!-- /section:basics/footer -->
    </div>
</div>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?=$host?>/statics/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='<?=$host?>/statics/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?=$host?>/statics/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?=$host?>/statics/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?=$host?>/statics/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?=$host?>/statics/js/jquery-ui.custom.min.js"></script>
<script src="<?=$host?>/statics/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?=$host?>/statics/js/jquery.easypiechart.min.js"></script>
<script src="<?=$host?>/statics/js/jquery.sparkline.min.js"></script>
<script src="<?=$host?>/statics/js/flot/jquery.flot.min.js"></script>
<script src="<?=$host?>/statics/js/flot/jquery.flot.pie.min.js"></script>
<script src="<?=$host?>/statics/js/flot/jquery.flot.resize.min.js"></script>

<!-- ace scripts -->
<script src="<?=$host?>/statics/js/ace-elements.min.js"></script>
<script src="<?=$host?>/statics/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
jQuery(function($) {
    $('.easy-pie-chart.percentage').each(function(){
        var $box = $(this).closest('.infobox');
        var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
        var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
        var size = parseInt($(this).data('size')) || 50;
        $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
            size: size
        });
    })

    $('.sparkline').each(function(){
        var $box = $(this).closest('.infobox');
        var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
        $(this).sparkline('html',
            {
                tagValuesAttribute:'data-values',
                type: 'bar',
                barColor: barColor ,
                chartRangeMin:$(this).data('min') || 0
            });
    });










    $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('.tab-content')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        //var w2 = $source.width();

        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
        return 'left';
    }


    $('.dialogs,.comments').ace_scroll({
        size: 300
    });


    //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
    //so disable dragging when clicking on label
    var agent = navigator.userAgent.toLowerCase();
    if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
        $('#tasks').on('touchstart', function(e){
            var li = $(e.target).closest('#tasks li');
            if(li.length == 0)return;
            var label = li.find('label.inline').get(0);
            if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
        });

    $('#tasks').sortable({
            opacity:0.8,
            revert:true,
            forceHelperSize:true,
            placeholder: 'draggable-placeholder',
            forcePlaceholderSize:true,
            tolerance:'pointer',
            stop: function( event, ui ) {
                //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                $(ui.item).css('z-index', 'auto');
            }
        }
    );
    $('#tasks').disableSelection();
    $('#tasks input:checkbox').removeAttr('checked').on('click', function(){
        if(this.checked) $(this).closest('li').addClass('selected');
        else $(this).closest('li').removeClass('selected');
    });


    //show the dropdowns on top or bottom depending on window height and menu position
    $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
        var offset = $(this).offset();

        var $w = $(window)
        if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
            $(this).addClass('dropup');
        else $(this).removeClass('dropup');
    });
})
</script>

<!-- the following scripts are used in demo only for onpage help and you don't need them -->
<link rel="stylesheet" href="<?=$host?>/statics/css/ace.onpage-help.css" />

<script type="text/javascript"> ace.vars['base'] = '..'; </script>
<script src="<?=$host?>/statics/js/ace/elements.onpage-help.js"></script>
<script src="<?=$host?>/statics/js/ace/ace.onpage-help.js"></script>
<script src="<?=$host?>/docs/assets/js/rainbow.js"></script>
<script src="<?=$host?>/docs/assets/js/language/generic.js"></script>
<script src="<?=$host?>/docs/assets/js/language/html.js"></script>
<script src="<?=$host?>/docs/assets/js/language/css.js"></script>
<script src="<?=$host?>/docs/assets/js/language/javascript.js"></script>
</body>
</html>
