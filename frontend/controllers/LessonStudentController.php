<?php

namespace frontend\controllers;

use Yii;
use common\components\ApiController;
use common\models\LessonStudent;
use common\models\search\LessonStudentSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * LessonStudentController implements the CRUD actions for LessonStudent model.
 */
class LessonStudentController extends ApiController
{
    /**
     * @var
     */
    public $modelClass = 'common\models\LessonStudent';

    /**
     * @var
     */
    public $searchModel = 'common\models\search\LessonStudentSearch';

    /**
     * Lists all LessonStudent models.
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $searchModel = new LessonStudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $dataProvider;
    }

    /**
     * Displays a single LessonStudent model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LessonStudent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|LessonStudent|string
     */
    public function actionCreate()
    {
        $model = new LessonStudent();

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
     * Updates an existing LessonStudent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|LessonStudent
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
     * Deletes an existing LessonStudent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return array
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return array(
            'status' => 1,
            'message' => 'successfully deleted'
        );
    }

    /**
     * Finds the LessonStudent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LessonStudent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LessonStudent::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
