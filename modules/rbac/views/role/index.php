<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\modules\rbac\models\Role;
use app\libs\Resource;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$categoryId = \Yii::$app->request->get('category');

$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
$columns =  [
          
           'id',
            'name',
            'description',

            [
                'class' => '\yii\grid\ActionColumn',
				'template'=>'{permission} {update} {delete}',
				'buttons' =>['permission'=>function ($url,$model) {
				    return Html::a('<img src="'.\Yii::$app->request->getHostInfo().'/assets/images/key.png">', Url::to(['relation','role'=>$model['id']]), [
				        'title' => '设置权限',
				    ]);
				},'delete'=>function($url,$model){
				    if($model->is_system)
				    {
				        return '';
				    }
				    return Html::a('<img src="'.\Yii::$app->request->getHostInfo().'/assets/images/cross.png">', $url, [
				        'title' => Yii::t('yii', 'Delete'),
				        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
				        'data-method' => 'post',
				        'data-pjax' => '0'
				    ]);
				}],
			],
        ];
?>

<div class="row">
    <div class="col-sm-12">
        <a href="/rbac/role/create">
            <button type="button" class="widget-toolbar" style="float:left">
                <span class="bigger-110">新建</span>
            </button></a>
    </div>
</div>




<div class="row">
    <div class="col-sm-12">

        <div class="widget-box transparent" id="recent-box">
            <div class="widget-header">


                <div class="widget-toolbar no-border" style="float:left">
                    <ul class="nav nav-tabs" id="recent-tab">
                         <li class="active">
                              <a data-toggle="tab" href="#task-tab">会员角色</a>
                          </li>

                        <li>
                            <a data-toggle="tab" href="#member-tab">管理员角色</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#comment-tab">系统角色</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-4">
                    <div class="tab-content padding-8">

<div id="task-tab" class="tab-pane active">
<?= GridView::widget([
                            'dataProvider' => $membersDataProvider,
                            'columns' => $columns,
                        ]); ?>

</div>

                        <div id="member-tab" class="tab-pane">

                            <?= GridView::widget([
                                'dataProvider' => $adminsDataProvider,
                                'columns' => $columns,
                            ]); ?>
                            <!-- /section:pages/dashboard.members -->
                        </div><!-- /.#member-tab -->

                        <div id="comment-tab" class="tab-pane">
                            <?= GridView::widget([
                                'dataProvider' => $systemsDataProvider,
                                'columns' => $columns,
                            ]); ?>
                        </div>
                    </div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->
</div><!-- /.row -->


    
