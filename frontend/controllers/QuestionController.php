<?php

namespace frontend\controllers;

use Yii;
use common\components\ApiController;
use common\models\Question;
use common\models\search\QuestionSearch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends ApiController
{
    /**
     * @var
     */
    public $modelClass = 'common\models\Question';

    /**
     * @var
     */
    public $searchModel = 'common\models\search\QuestionSearch';

    /**
     * Lists all Question models.
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $dataProvider;
    }

    /**
     * Displays a single Question model.
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
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|Question|string
     */
    public function actionCreate()
    {
        $model = new Question();

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
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Question
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
     * Deletes an existing Question model.
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
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
