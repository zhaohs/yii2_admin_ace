<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
\app\libs\Utility::viewToolsBars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>


<!-- PAGE CONTENT ENDS -->
</div>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        'columns' => [
            'id',
            [
    			'attribute'=>'name',
                'format' => 'raw',
				'value'=>function ($model)
					{
						return Html::a($model->name,['/menu/menu/index','category'=>$model->id]);
					}
			],
            'description',
            [

                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}|{delete}',
                'header' => '操作',
            ],
        ],
    ]); ?>

                   