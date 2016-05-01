<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\DictCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '字典';
$this->params['breadcrumbs'][] = $this->title;
\app\libs\Utility::viewToolsBars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
    			'attribute'=>'name',
    			'format'=>'html',
				'value'=>function ($model,$key,$index,$column)
					{
						return Html::a($model->name,['/dict/dict/index','category'=>$model->id]);
					}
			],

            'description',
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