<?php

use yii\helpers\Html;
use app\libs\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="relation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role')->textInput(['maxlength' => 64,'readonly'=>true]) ?>

    <?= $form->field($model, 'permission')->textInput(['maxlength' => 64,'readonly'=>true]) ?>

    <?= $form->field($model, 'rule')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->defaultButtons($model) ?>

    <?php ActiveForm::end(); ?>

</div>
