<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 16/4/29
 * Time: 09:18
 */
namespace app\modules\menu;

class Module extends \yii\base\Module
{
    //public $defaultRoute = 'site/index';
    //public $layout = null;

    public function init()
    {
        parent::init();
        \Yii::configure($this, require(__DIR__ . '/config/config.php'));
    }
}