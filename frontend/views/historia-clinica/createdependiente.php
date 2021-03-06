<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HistoriaClinica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historia-clinica-form">
    <?php $form = ActiveForm::begin(['id' => 'paciente']); ?>
    <div class="form-group">
        <?= $form->field($modelP, 'tipo_paciente')->hiddenInput(['value' => 'trabajadores'])->label(" ") ?>
        <?= $form->field($modelP, 'cedula')->textInput(['maxlength' => true, 'style' => 'width:400px', 'id' => 'cedula']) ?> <!--    ['disabled' => ($model->tipo_paciente=='estudiantes') ? 'disabled' : false]-->
        <?= $form->field($modelP, 'fecha_regPaciente')->textInput(['type' => "hidden", 'value' => date('Y-m-d H:i'), 'style' => 'width:300px'])->label(" ") ?>
    </div>
    <div class="form-group">
        <?= Html::button('Buscar', ['class' => 'btn btn-primary', 'type' => "submit"]) ?>
    </div>


    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_paciente')->textInput(['readonly' => true,]) ?>
    <?= $form->field($model, 'num_historia')->textInput(['maxlength' => true, 'value'=>$dataProvider->allModels[0]['nombres']])->label("Nombre") ?>
    <?= $form->field($model, 'num_historia')->textInput(['maxlength' => true, 'value'=>$dataProvider->allModels[0]['telefono']])->label("Telefono") ?>
    <?= $form->field($model, 'num_historia')->textInput(['maxlength' => true, 'value'=>$dataProvider->allModels[0]['departamento']])->label("Departamento") ?>

    <h1>Antecedentes</h1>
    <!--    formulario antecedentes-->
    <?= $form->field($antecedentes, 'hb_alcohol')->checkbox() ?>
    <?= $form->field($antecedentes, 'hb_tabaco')->checkbox() ?>
    <?= $form->field($antecedentes, 'hb_malaAliment')->checkbox() ?>
    <?= $form->field($antecedentes, 'hb_vidaSedent')->checkbox() ?>
    <?= $form->field($antecedentes, 'alg_cardiaca')->checkbox() ?>
    <?= $form->field($antecedentes, 'alg_respiratoria')->checkbox() ?>
    <?= $form->field($antecedentes, 'alg_quirurgica')->checkbox() ?>
    <?= $form->field($antecedentes, 'alg_traumatolog')->checkbox() ?>
    <?= $form->field($antecedentes, 'cancer')->checkbox() ?>
    <?= $form->field($antecedentes, 'diabetes')->checkbox() ?>
    <?= $form->field($antecedentes, 'hipertension')->checkbox() ?>
    <?= $form->field($antecedentes, 'tuberculosis')->checkbox() ?>
    <?= $form->field($antecedentes, 'id_paciente')->textInput(['type' => "hidden",])->label(" ") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

