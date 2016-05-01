<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model source\models\DictCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

<?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord?null:'readonly'])?>
    
        <?= $form->field($model, 'name')->textInput(['maxlength' => 64])?>
    
        <?= $form->field($model, 'description')->textarea(['maxlength' => 512])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>