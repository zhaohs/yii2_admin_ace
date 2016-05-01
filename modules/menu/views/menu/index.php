<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\menu\models\MenuCategory;
use yii\helpers\Url;
use app\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$category= \Yii::$app->request->get('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = $categoryModel['name'];
$this->params['breadcrumbs'] = [
            ['label' => '菜单管理',['/menu']],
		];

?>
<div class="row">
    <a href="/menu/menu/create?category=<?= $category; ?>">
        <button type="button" class="widget-toolbar" style="float:left">
            <span class="bigger-110">新建</span>
        </button></a>
</div>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            'id',
			[
				'attribute'=>'name',
                'format' => 'raw',
				'value'=>function ($model){
					return str_repeat(Constants::TabSize, $model->level).Html::a($model->name,['/menu/menu/update','id'=>$model->id]);
				}
			], 
			'url',
			'targetText',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}|{delete}',
                'header' => '操作',
            ],
        ],
    ]); ?>

                 
