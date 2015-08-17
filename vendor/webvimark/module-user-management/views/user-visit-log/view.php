<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\UserVisitLog $model
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Visit log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <div class="user-visit-log-view">


                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [
                                                [
                                                    'attribute' => 'user_id',
                                                    'value' => @$model->user->username,
                                                ],
                                                'ip',
                                                'language',
                                                'os',
                                                'browser',
                                                'user_agent',
                                                'visit_time:datetime',
                                            ],
                                        ]) ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>