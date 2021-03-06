<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use backend\models\Branches;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>
   
     <?=
                            DatePicker::widget([
                                'model' => $model,
                                'attribute' => 'department_created_date',
                                'template' => '{addon}{input}',
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]
                            ]);
                            ?>

    <?= $form->field($model, 'department_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companies_company_id')->dropDownList(
      ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
            ['prompt'=>'Select Company']
            ) ?>

    <?= $form->field($model, 'branches_branch_id')->dropDownList(
      ArrayHelper::map(Branches::find()->all(),'branch_id','branch_name'),
            ['prompt'=>'Select Branch']
            ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
