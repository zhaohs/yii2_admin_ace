<?php

use yii\helpers\Html;
use app\libs\widgets\ActiveForm;
use app\models\Menu;
use app\libs\Common;
use app\libs\Constants;
use app\libs\TreeHelper;
use yii\helpers\ArrayHelper;
use app\modules\rbac\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255,'readonly'=>$model->isNewRecord?null:'readonly']) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($rbacService->getAllRoles(), 'id', 'name','category')) ?>

    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

    <?= $form->defaultButtons($model) ?>

    <?php ActiveForm::end(); ?>