<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\models\MenuCategory */


$this->title = '新建菜单';
$this->params['breadcrumbs'][] = $this->title;

?>

 <?= $this->render('_form', [
        'model' => $model,
    ]) ?>