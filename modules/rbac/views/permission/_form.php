<?php

use yii\helpers\Html;
use app\libs\widgets\ActiveForm;
use app\modules\rbac\models\Category;
use app\modules\rbac\models\Permission;

use app\modules\rbac\rules\Rule;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Permission */
/* @var $form yii\widgets\ActiveForm */
\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'category')->dropDownList(Permission::getCategoryItems()) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'form')->radioList(Permission::getFormItems()) ?>

    <?= $form->field($model, 'default_value')->textarea() ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?= $form->field($model, 'rule')->dropDownList(Rule::getRules()) ?>

    <?= $form->field($model, 'sort_num')->textInput(['maxlength' => true]) ?>

    <?= $form->defaultButtons($model) ?>

    <?php ActiveForm::end(); ?>