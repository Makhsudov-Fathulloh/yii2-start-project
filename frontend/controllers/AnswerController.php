<?php

namespace frontend\controllers;

use Yii;
use common\models\Answer;
use common\models\search\AnswerSearch;
use common\components\ApiController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends ApiController
{
    /**
     * @var
     */
    public $modelClass = 'common\models\Answer';

    /**
     * @var
     */
    public $searchModel = 'common\models\search\AnswerSearch';

    /**
     * Lists all Answer models.
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $searchModel = new AnswerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $dataProvider;
    }

    /**
     * Displays a single Answer model.
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
     * Creates a new Answer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|Answer|string
     */
    public function actionCreate()
    {
        $model = new Answer();

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
     * Updates an existing Answer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Answer
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
     * Deletes an existing Answer model.
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
     * Finds the Answer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Answer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Answer::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
