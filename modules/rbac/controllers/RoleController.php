<?php

namespace app\modules\rbac\controllers;

use Yii;
use app\modules\rbac\models\Role;
use app\modules\rbac\models\search\RoleSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\rbac\models\Relation;
use app\modules\rbac\models\Permission;
use yii\data\ArrayDataProvider;
use app\libs\ArrayHelper;

/**
 * RoleController implements the CRUD actions for Role model.
 */
class RoleController extends \app\libs\BackController
{

    /**
     * Lists all Role models.
     * @return mixed
     */
    public function actionIndex()
    {
        $result = [];
        $rows = Role::find()->all();
        foreach($rows as $row)
        {
            $result[$row->category][]=$row;
        }
        
        return $this->render('index', [
            'membersDataProvider' => new ArrayDataProvider(['allModels'=>ArrayHelper::getValue($result, Role::Category_Member,[]),'key'=>'id']),
            'adminsDataProvider' => new ArrayDataProvider(['allModels'=>ArrayHelper::getValue($result, Role::Category_Admin,[]),'key'=>'id']),
            'systemsDataProvider' => new ArrayDataProvider(['allModels'=>ArrayHelper::getValue($result, Role::Category_System,[]),'key'=>'id']),
        ]);
    }

    public function actionRelation($role)
    {
        if(\Yii::$app->request->isPost){
    
            $selectedPermissions = \Yii::$app->request->post('Permission');
    
            Relation::AddBatchItems($role, $selectedPermissions);
    
            return $this->redirect(['index','role'=>$role]);
        }
         
        $allPermissions = Permission::getAllPermissionsGroupedByCategory();
        $rolePermissions = Relation::find()->select(['permission','value'])->where(['role'=>$role])->indexBy('permission')->all();
        $categories = Permission::getCategoryItems();
        $role = Role::findOne(['id'=>$role]);
         
        return $this->render('relation', [
            'rolePermissions' => $rolePermissions,
            'allPermissions' => $allPermissions,
            'categories'=>$categories,
            'role'=>$role
        ]);
    }
    /**
     * Displays a single Role model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Role model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Role();
        $model->is_system=false;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Role model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Role::findOne(['id'=>$id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Role model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
