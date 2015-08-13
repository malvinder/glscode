<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

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
                                <?= $form->field($events, 'id')->hiddenInput()->label(false); ?>
                                <?= $form->field($events, 'event_name')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'organized_by')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'start_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'end_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'location')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'address')->textarea(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'city')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'state')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'account_num')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'short_code')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'contact_name')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'customer_phone')->textInput(); ?>
                            </div>

                            <div class="form-group">
                                <?= $form->field($events, 'coordinator')->dropDownList(ArrayHelper::map($coordinator, 'userId', 'fullname'), ['prompt' => '--Choose Type--']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'evr_coordinator')->dropDownList(ArrayHelper::map($coordinator, 'userId', 'fullname'), ['prompt' => '--Choose Type--']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'evr_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
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