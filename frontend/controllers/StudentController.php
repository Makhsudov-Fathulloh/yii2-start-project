<?php

namespace frontend\controllers;

use Yii;
use common\components\ApiController;
use common\models\search\StudentSearch;
use common\models\Student;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends ApiController
{
    /**
     * @var
     */
    public $modelClass = 'common\models\Student';

    /**
     * @var
     */
    public $searchModel = 'common\models\search\StudentSearch';

    /**
     * Lists all Student models.
     *
     * @return ActiveDataProvider
     */
    public function actionIndex(): ActiveDataProvider
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        //        return $this->render('index', [
        //            'searchModel' => $searchModel,
        //            'dataProvider' => $dataProvider,
        //        ]);

        return $dataProvider;
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return array|Student|string
     */
    public function actionCreate()
    {
        $model = new Student();

        //        $model->load(Yii::$app->request->post());
        //        echo "<pre>";
        //        print_r($model->attributes);
        //        echo "</pre>";
        //        exit();

        if ($this->request->isPost) {

//            var_dump(Yii::$app->request->bodyParams);
//            die();

            if ($model->load($this->request->post(), '') && $model->save()) {

                return $model;
            }
        } else {
            return $model->getErrors();
        }

        return 'invalid request';
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|Student
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
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return string[]
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
