<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 16/4/29
 * Time: 09:19
 */
namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Menu;
use yii\data\ArrayDataProvider;
class SiteController extends \app\libs\BackController
{

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goBack('login');
    }

    public function actionLogin()
    {
        if (! Yii::$app->user->isGuest)
        {
            return $this->goBack('index');
        }
        $message='';
        $model = new \app\models\LoginForm();
        if ($model->load(Yii::$app->request->post()))
        {
            if( $model->login())
            {
                return $this->redirect(['/admin/site/index']);
            }
            else
            {
                $message = '用户名或者密码错误';
            }
        } else {
            $message = '用户不存在';
        }
        $this->layout = '@app/views/layouts/single.php';
        return $this->render('login', [
            'message' => $message
        ]);
    }
}