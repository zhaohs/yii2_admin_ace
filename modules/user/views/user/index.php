<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="row">
        <a href="/user/user/create">
                <button type="button" class="widget-toolbar" style="float:left">
                    <span class="bigger-110">新建</span>
                </button></a>
        </div>
        <!-- PAGE CONTENT ENDS -->
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
            'email',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}|{delete}',
                'header' => '操作',
            ],
        ],
    ]); ?>