<?php

use yii\helpers\Html;
use app\libs\widgets\ActiveForm;
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
<?php
\app\libs\Utility::viewToolsBars([
    Html::a('返回', ['index','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>

    <?php $form = ActiveForm::begin(); ?>


<div class="form-group field-menu-name required">
    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="menu-name">父结点</label>
    <div class="col-xs-12 col-sm-5">
        <span class="block input-icon input-icon-right">
             <select type="text" id="menu-parent_id" class="form-control" name="Menu[parent_id]">
                 <?php echo $options?>
             </select>
        </span>
    </div>
    <div class="help-block col-xs-12 col-sm-reset inline"></div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
    <?= $form->field($model, 'description')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'target')->radioList(Constants::getTargetItems()) ?>

    

    <?= $form->field($model, 'thumb')->fileInput(['class'=>'da-custom-file']) ?>
    
    <?= $form->field($model, 'sort_num')->textInput() ?>
    
    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

<?= $form->defaultButtons($model) ?>

<?php ActiveForm::end(); ?>
