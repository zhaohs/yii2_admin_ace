<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\models\Dict */

$this->title = '修改字典: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dicts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>