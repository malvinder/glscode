<?php
/**
 *
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var webvimark\modules\UserManagement\models\rbacDB\Permission $model
 */

use webvimark\modules\UserManagement\UserManagementModule;

$this->title = UserManagementModule::t('back', 'Permission creation');
$this->params['breadcrumbs'][] = ['label' => UserManagementModule::t('back', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <h2 class="lte-hide-title"><?= $this->title ?></h2>

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?= $this->render('_form', [
                                        'model' => $model,
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