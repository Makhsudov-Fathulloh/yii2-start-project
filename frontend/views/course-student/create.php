<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\CourseStudent $model */

$this->title = Yii::t('app', 'Create Course Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
