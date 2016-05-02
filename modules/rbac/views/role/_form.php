<?php

use yii\helpers\Html;
use app\libs\widgets\ActiveForm;
use app\modules\rbac\models\Category;
use app\libs\Constants;
use app\modules\rbac\models\Role;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Role */
/* @var $form yii\widgets\ActiveForm */
\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'category')->dropDownList(Role::getCategoryItems()) ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->defaultButtons($model) ?>
    <?php ActiveForm::end(); ?>