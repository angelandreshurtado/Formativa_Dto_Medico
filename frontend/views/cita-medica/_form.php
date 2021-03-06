<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\data\ArrayDataProvider;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\CitaMedica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cita-medica-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="form-group col-md-4"> 
            <?=
                    $form->field($model, 'id_paciente')->
                    widget(Select2::className(), [
                        'data' => [(\yii\helpers\ArrayHelper::map(app\models\Paciente::find()->asArray()->all(), 'id_paciente', function($model, $defaultValue) {
                                        return (empty($model['cedula'])) ? $model['num_matricula'] : $model['cedula'];
                                    }))],
                        'options' => ['placeholder' => 'Elegir una opción', 'id' => 'opcion'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ])
            ?></div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'id_doctor')->textInput(['maxlength' => true, 'style' => 'width:300px', 'readonly' => true, 'value' => Yii::$app->user->identity->id]) ?> 
        </div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'fecha_cita')->textInput(['style' => 'width:300px', 'readonly' => true, 'value' => date('Y-m-d h:m:s')]) ?>
        </div>

        <center><h3>DATOS PRINCIPALES</h3></center>
        <div class="form-group col-md-3"> 
            <?= $form->field($model, 'tipo_atencion')->dropDownList(['Urgente' => 'Urgente', 'Emergente' => 'Emergente'],['maxlength' => true, 'style' => 'width:250px']) ?>    
        </div>
        <div class="form-group col-md-2"> 
            <?= $form->field($model, 'presion_arterial')->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
        </div>
        <div class="form-group col-md-2"> 
            <?= $form->field($model, 'frc_cardiaca')->textInput(['maxlength' => true, 'style' => 'width:150px']) ?>
        </div>
        <div class="form-group col-md-2"> 
            <?= $form->field($model, 'temperatura')->textInput(['style' => 'width:150px']) ?>
        </div>
        <div class="form-group col-md-2"> 
            <?= $form->field($model, 'peso')->textInput(['style' => 'width:150px']) ?>
        </div>

        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'sintomas')->textarea(['rows' => 6, 'style' => 'width:300px']) ?>
        </div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'revision_fisica')->textarea(['rows' => 6, 'style' => 'width:300px']) ?>
        </div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'diagnostico')->textarea(['rows' => 6, 'style' => 'width:300px']) ?>
        </div>    
        <div class="form-group col-md-12"> 
            <?= Html::button('Examenes', ['class' => 'btn btn-primary', 'type' => "submit"]) ?>
        </div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'diagnostico_exFisicos')->textarea(['rows' => 6, 'style' => 'width:300px']) ?>
        </div>
        <div class="form-group col-md-4"> 
            <center><p>RECETA</p>
                <?= Html::button('Medicamentos', ['class' => 'btn btn-primary', 'type' => "submit"]) ?>
            </center>
        </div>
        <div class="form-group col-md-4"> 
            <?= $form->field($model, 'tratamiento_sm')->textarea(['rows' => 6, 'style' => 'width:300px']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('Imprimir Receta', ['class' => 'btn btn-primary', 'type' => "submit"]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
