<?php

namespace app\modules\dict\controllers;

use Yii;
use app\modules\dict\models\DictCategory;
use app\modules\dict\models\search\DictCategorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DictCategoryController implements the CRUD actions for DictCategory model.
 */
class DictCategoryController extends \app\libs\BackController
{

    /**
     * Lists all DictCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DictCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DictCategory model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => DictCategory::findOne($id),
        ]);
    }

    /**
     * Creates a new DictCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DictCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DictCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = DictCategory::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DictCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        DictCategory::findOne($id)->delete();

        return $this->redirect(['index']);
    }
}
