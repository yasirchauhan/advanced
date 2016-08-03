<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companies_company_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branches_branch_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
