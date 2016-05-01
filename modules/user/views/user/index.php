<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
\app\libs\Utility::viewToolsBars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>
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