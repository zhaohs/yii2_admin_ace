<?php

use yii\helpers\Html;

use app\modules\menu\models\MenuCategory;


/* @var $this yii\web\View */
/* @var $model source\models\Menu */

$category=\Yii::$app->request->get('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = '新建菜单项';

?>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>