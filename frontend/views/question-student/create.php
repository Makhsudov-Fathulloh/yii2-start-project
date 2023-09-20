<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\QuestionStudent $model */

$this->title = Yii::t('app', 'Create Question Student');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Question Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
