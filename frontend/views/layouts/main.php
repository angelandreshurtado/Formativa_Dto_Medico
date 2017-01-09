<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'App',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Inicio', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Administracion',
                    'items' => [
                        [
                            'label' => 'Historia Clínica Paciente',
                            'url' => ['/paciente'],
                        ],
                        [
                            'label' => 'Historia Clínica Dependiente',
                            'url' => ['/dependiente'],
                        ],
                        [
                            'label' => 'Hoja Evolución',
                            'url' => ['/cita-medica/create'],
                        ],
                        [
                            'label' => 'Agendar Cita',
                            'url' => ['/'],
                        ],
                        [
                            'visible' => Yii::$app->user->identity->isAdmin || Yii::$app->user->can('superadmin'),
                            'label' => 'Inventario de Medicamentos',
                            'url' => ['/'],
                        ],
                        [
                            'label' => 'Certificado Médico',
                            'url' => ['/'],
                        ],
                    ],
                ];
                $menuItems[] = [
                    'label' => 'Reportes',
                    'items' => [
                        [
                            'label' => 'Medicamentos en Stock',
                            'url' => ['/'],
                        ],
                        [
                            'label' => 'Medicamentos por caducar',
                            'url' => ['/'],
                        ],
                        [
                            'label' => 'Emisión de copia de Certificado',
                            'url' => ['/'],
                        ],
                    ],
                ];
                $menuItems[] = [
                    'label' => Yii::$app->user->identity->username,
                    'items' => [
                        [
                            'label' => 'Perfil de Usuario',
                            'url' => ['/user/settings/profile'],
                        ],
                        [
                            'label' => 'Ir a Escritorio',
                            'url' => ['/../../backend/web'],
                        ],
                        [
                            'label' => 'Salir del Sistema',
                            'url' => ['/user/security/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ],
                    ],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; PUCESE <?= date('Y') ?></p>

                <!--p class="pull-right">< ?= Yii::powered() ?></p-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
