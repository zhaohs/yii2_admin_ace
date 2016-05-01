<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\libs\Constants;
use yii\grid\GridView;
use app\modules\dict\models\DictCategory;

/* @var $this source\core\back\BackView */
/* @var $searchModel source\models\search\DictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$category=Yii::$app->request->get('category');
$categoryModel = DictCategory::findOne(['id'=>$category]);

$this->title = '字典';
$this->params['breadcrumbs'][] = $this->title;

\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['/dict/dict-category'], ['class' => 'btn btn-xs btn-primary mod-site-save']),
    Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            'id',
            'name',
            'value',
            'sort_num',
            'status',
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

        ],
    ]); ?>