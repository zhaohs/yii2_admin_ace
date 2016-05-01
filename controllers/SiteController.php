<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yzl\thrift\UserClient;
use app\controllers\BaseController;
use app\components\Response;
use yzl\tools\ApiRequest;
use app\models\ModelCommon;

class SiteController extends BaseController
{
    public function actionIndex()
    {/*{{{*/
        echo 'index';
    }/*}}}*/


    public function actionInsert(){
        echo 'insert';
    }

    public function actionDelete(){
        echo 'delete';
    }
    public function actionUpdate(){
        echo 'update';
    }
    public function actionSearch(){
        echo 'search';
    }


}
