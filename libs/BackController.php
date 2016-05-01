<?php
namespace app\libs;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\modules\rbac\RbacService;

class BackController extends Controller
{

    public $rbacService;

    public $ingorePermissionArr = [];

    public function init() {
        parent::init();
        $this->rbacService = new RbacService();
    }

    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
        {
            return false;
        }
        //检查不需要登录的action uniqueID,如 site/login, site/captcha
        if (in_array($action->uniqueID, $this->ignoreLogin()))
        {
            return parent::beforeAction($action);
        }
        if (\Yii::$app->user->isGuest)
        {
            $this->redirect(['/admin/site/login']);
        }

        if(in_array($action->uniqueID, $this->ingorePermission()))
        {
            return parent::beforeAction($action);
        }

        if (! $this->rbacService->checkPermission('manager_admin'))
        {
            return $this->showMessage();
        }

        if(! $this->rbacService->checkPermission())
        {
            return $this->showMessage();
        }
        else
        {
            return parent::beforeAction($action);
        }
    }

    public function ignoreLogin()
    {
        return [
            'admin/site/login',
            'admin/site/captcha',
        ];
    }

    public function ingorePermission()
    {
        return $this->ingorePermissionArr ? $this->ingorePermissionArr : [
            'admin/site/logout',
            'admin/site/login',
            'admin/site/error',
            'admin/site/welcome',
            'admin/site/index',
        ];
    }

    public function showMessage($message = null, $title = '提示',$params=[])
    {
        if ($message === null)
        {
            $message = '权限不足，无法进行此项操作';
        }

        $params=array_merge(['title'=>$title,'message'=>$message],$params);

        return $this->render('/admin/site/message',$params);
    }
}