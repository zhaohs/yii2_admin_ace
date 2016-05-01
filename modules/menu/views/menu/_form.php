<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\menu\models\Menu;
use app\libs\Common;
use app\libs\Constants;
use app\libs\TreeHelper;

/* @var $this yii\web\View */
/* @var $model source\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$category=$model->category_id;


$taxonomies = Menu::getArrayTree($category);

$options = TreeHelper::buildTreeOptionsForSelf($taxonomies, $model);

?>
<style>

</style>
<?php /*$this->toolbars([
    Html::a('返回', ['index','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);*/?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="da-form-row">
        <label>父结点</label>
        <div class="da-form-item small">
            <?php echo Html::activeHiddenInput($model, 'category_id')?>
            <select type="text" id="menu-parent_id" class="form-control" name="Menu[parent_id]">
            <?php echo $options?>
            </select>
        </div>
    </div>                 

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'target')->radioList(Constants::getTargetItems()) ?>

    

    <?= $form->field($model, 'thumb')->fileInput(['class'=>'da-custom-file']) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
