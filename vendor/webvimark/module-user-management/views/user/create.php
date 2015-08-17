<?php

use webvimark\modules\UserManagement\UserManagementModule;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\User $model
 */

$this->title = UserManagementModule::t('back', 'User creation');
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <div class="user-create">

                                <h2 class="lte-hide-title"><?= $this->title ?></h2>

                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <?= $this->render('_form', compact('model')) ?>
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