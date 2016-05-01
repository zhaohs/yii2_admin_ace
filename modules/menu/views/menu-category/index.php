<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <a href="/menu/menu-category/create">
        <button type="button" class="widget-toolbar" style="float:left">
            <span class="bigger-110">新建</span>
        </button></a>
</div>

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

                   