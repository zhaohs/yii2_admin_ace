<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\dict\models\Dict;
use app\libs\Common;
use app\libs\Constants;
use app\libs\TreeHelper;

/* @var $this yii\web\View */
/* @var $model source\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$category=$model->category_id;


$categories = Dict::getArrayTree($category);

$options = TreeHelper::buildTreeOptionsForSelf($categories, $model);

?>

<?php
\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="da-form-row">
        <label>父结点</label>
        <div class="da-form-item small">
            <?php echo Html::activeHiddenInput($model, 'category_id')?>
            <select type="text" id="menu-parent_id" class="form-control" name="Dict[parent_id]">
            <?php echo $options?>
            </select>
        </div>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'value')->textarea() ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => 512]) ?>
    <?= $form->field($model, 'description')->textarea(['maxlength' => 512]) ?>    

    <?= $form->field($model, 'sort_num')->textInput() ?>
    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
    <?php ActiveForm::end(); ?>

