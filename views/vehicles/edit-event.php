<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

?>

<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading font-bold">Add Vehicle Status</div>
                        <div class="panel-body">

                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= $form->field($event, 'id')->hiddenInput()->label(false); ?>

                                <?= $form->field($event, 'event_name')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($event, 'organized_by')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($event, 'event_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($event, 'event_time')->input('time'); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($event, 'location')->textInput(); ?>
                            </div>


                            <div class="form-group">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>