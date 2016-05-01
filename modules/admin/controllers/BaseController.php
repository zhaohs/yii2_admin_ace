<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 16/4/29
 * Time: 09:41
 */
namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;

class BaseController extends \app\libs\BackController
{
    public function beforeAction($action) {
        return parent::beforeAction($action);
    }
}