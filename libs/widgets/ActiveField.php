<?php
namespace app\libs\widgets;

use Yii;
use yii\helpers\Html;

class ActiveField extends \yii\widgets\ActiveField
{



    public $inputOptions = ['class' => 'width-100'];

    public $errorOptions = ['class' => 'help-block col-xs-12 col-sm-reset inline'];

    public $labelOptions = ['class' => 'col-xs-12 col-sm-3 control-label no-padding-right'];

    public $hintOptions = ['class' => 'col-xs-12 col-sm-3 control-label no-padding-right', 'for' => 'inputError'];

    public $template = "{label}<div class=\"col-xs-12 col-sm-5\"><span class=\"block input-icon input-icon-right\">{input}</span></div>{error}{hint}";

}