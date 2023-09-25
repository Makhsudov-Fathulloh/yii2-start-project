<?php

namespace frontend\controllers;

use Yii;
use common\components\ApiController;
use common\models\search\TeacherSearch;
use common\models\Teacher;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends ApiController
{
    /**
     * @var
     */
    public $modelClass = 'common\models\Teacher';

    /**
     * @var
     */
    public $searchModel = 'common\models\search\TeacherSearch';

    /**
     * Lists all Teacher models.
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

       return $dataProvider;
    }

    /**
     * Displays a single Teacher model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|Teacher|string
     */
    public function actionCreate()
    {
        $model = new Teacher();

        if ($this->request->isPost) {
            if ($model->load($this->request->post(), '') && $model->save()) {

                return $model;
            }
        } else {
            return $model->getErrors();
        }

        return 'invalid request';
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Teacher
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPut && $model->load($this->request->post(), '') && $model->save()) {

            return $model;
        }

        return 'invalid request';
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teacher::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
