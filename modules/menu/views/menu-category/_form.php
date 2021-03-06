<?php
use yii\helpers\Html;
use app\libs\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model source\models\MenuCategory */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord?null:'readonly'])?>

<?= $form->field($model, 'name')->textInput(['maxlength' => 64])?>

<?= $form->field($model, 'description')->textarea(['maxlength' => 512])?>

<?= $form->defaultButtons($model) ?>

<?php ActiveForm::end(); ?>