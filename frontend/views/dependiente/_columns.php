<?php

use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'cedula',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fecha_regDependiente',
    ],
    /* [
      'class'=>'\kartik\grid\DataColumn',
      'attribute'=>'id_paciente',
      ], */
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nombres',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'apellidos',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fecha_nac',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'estado_civil',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action, 'id_paciente' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'],
    ],
];
