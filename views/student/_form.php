<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Group;
use app\models\Subject;


/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Code')->textInput() ?>

    <?= $form->field($model, 'group_id')->dropDownList(ArrayHelper::map(Group::find()->all(),'ID', 'Title')) ?>

    <?= $form->field($model, 'subject_buf')->checkboxList(ArrayHelper::map(Subject::find()->all(),'ID', 'Title')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
