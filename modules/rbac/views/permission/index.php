<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\PermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$categoryId = \Yii::$app->request->get('category');

$this->title = '权限管理';
$this->params['breadcrumbs'][] = $this->title;

$columns =  [

    [
        'attribute'=>'id',
    ],
    [
        'attribute'=>'name',
    ],
    [
        'attribute'=>'description',
    ],
    [
        'attribute' => 'form',
        'value' => function($model){
            return Permission::getFormItems($model->form);
        }
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{update}|{delete}',
        'header' => '操作',
        /*'buttons' => [
            'update' => function ($url, $model, $key) {
                //$url = '/game-impression-tag?ImpressionTag[typeId]='.$model->id;
                return Html::a('标签', $url, ['title'=>'标签']);
            },
            'delete' => function ($url, $model, $key)
            {
               // $url = 'create?id='.$model->id;
                return Html::a('修改', $url, ['title'=>'修改']);
            },
        ],*/
    ],
];
\app\libs\Utility::viewToolsBars([
    Html::a('新建权限', ['create','category'=>$categoryId], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);

?>
<div class="row">
<div class="col-sm-12">

<div class="widget-box transparent" id="recent-box">
<div class="widget-header">


    <div class="widget-toolbar no-border" style="float:left">
        <ul class="nav nav-tabs" id="recent-tab">
          <!--  <li class="active">
                <a data-toggle="tab" href="#task-tab">基本权限</a>
            </li>
-->
            <li class="active">
                <a data-toggle="tab" href="#member-tab">控制器权限</a>
            </li>

            <li>
                <a data-toggle="tab" href="#comment-tab">系统权限</a>
            </li>
        </ul>
    </div>
</div>

<div class="widget-body">
<div class="widget-main padding-4">
<div class="tab-content padding-8">
    <!--
<div id="task-tab" class="tab-pane active">
<?= GridView::widget([
        'dataProvider' => $basicsDataProvider,
        'columns' => $columns,
    ]); ?>

</div>
 -->
<div id="member-tab" class="tab-pane active">

    <?= GridView::widget([
        'dataProvider' => $controllersDataProvider,
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

