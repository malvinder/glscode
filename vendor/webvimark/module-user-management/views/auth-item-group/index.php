<?php

use webvimark\extensions\GridPageSize\GridPageSize;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var webvimark\modules\UserManagement\models\rbacDB\search\AuthItemGroupSearch $searchModel
 */

$this->title = UserManagementModule::t('back', 'Permission groups');
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="app-content" role="main">

    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="panel-body">
                <div class="wrapper-md">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $this->title ?>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <?= GhostHtml::a(
                                        '<span class="glyphicon glyphicon-plus-sign"></span> ' . UserManagementModule::t('back',
                                            'Create'),
                                        ['create'],
                                        ['class' => 'btn btn-success']
                                    ) ?>
                                </p>
                            </div>

                            <div class="col-sm-6 text-right">
                                <?= GridPageSize::widget(['pjaxId' => 'auth-item-group-grid-pjax']) ?>
                            </div>
                        </div>


                        <?php Pjax::begin([
                            'id' => 'auth-item-group-grid-pjax',
                        ]) ?>

                        <?= GridView::widget([
                            'id' => 'auth-item-group-grid',
                            'dataProvider' => $dataProvider,
                            'pager' => [
                                'options' => ['class' => 'pagination pagination-sm'],
                                'hideOnSinglePage' => true,
                                'lastPageLabel' => '>>',
                                'firstPageLabel' => '<<',
                            ],
                            'layout' => '{items}<div class="row"><div class="col-sm-8">{pager}</div><div class="col-sm-4 text-right">{summary}</div></div>',
                            'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn', 'options' => ['style' => 'width:10px']],
                                [
                                    'attribute' => 'name',
                                    'value' => function ($model) {
                                        return Html::a($model->name, ['update', 'id' => $model->code],
                                            ['data-pjax' => 0]);
                                    },
                                    'format' => 'raw',
                                ],
                                'code',
                                ['class' => 'yii\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'contentOptions' => ['style' => 'width:70px; text-align:center;'],
                                ],
                            ],
                        ]); ?>

                        <?php Pjax::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>