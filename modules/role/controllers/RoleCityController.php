<?php

namespace app\modules\role\controllers;

use Yii;
use app\modules\role\models\RoleCity;
use app\modules\role\models\search\RoleCitySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use app\modules\rbac\models\Role;
use app\modules\dict\models\Dict;

/**
 * DefaultController implements the CRUD actions for Menu model.
 */
class RoleCityController extends \app\libs\BackController
{
    public $defaultAction = 'create';
    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionCreate()
    {
        $category = \Yii::$app->request->get('category');
        $model = RoleCity::findOne(['role' => $category]);
        $checkedCityList = [];
        if (empty($model)) {
            $model = new RoleCity();
            $model->role = $category;
        } else {
            $checkedCityList = json_decode($model->city, 1);
        }

        if(\Yii::$app->request->isPost){
            $params = \Yii::$app->request->post('RoleCity');
            $model->city = $params['city'] ? json_encode($params['city']) : json_encode([]);
            $model->save();
            return $this->redirect(['create','category'=>$category]);
        }
        $role = Role::findOne(['id' => $category]);
        $cityList =  Dict::find()->where(['category_id' => 'city_alias_pinyin'])->all();

        return $this->render('index', [
            'role' => $role,
            'model' => $model,
            'cityList' => $cityList,
            'checkedCityList' => $checkedCityList
        ]);
    }
}
