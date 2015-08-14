<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group pull-left">
                        <?= Html::Button('Request Form', ['class' => 'btn btn-primary padding-left-10']) ?>
                    </div>
                    <div class="form-group pull-left padding-left-10">
                        <?= Html::Button('Materials', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <div class="form-group pull-left padding-left-10">
                        <?= Html::Button('WO Details', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-6">

                    <div class="panel panel-default">
                        <div class="panel-heading font-bold">Add Vehicle Status</div>
                        <div class="panel-body">

                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= $form->field($events, 'job_number')->textInput(); ?>
                            </div>
                            <div class="form-group">
                                <?php $events->date_entered = date('Y-m-d'); ?>
                                <?= $form->field($events, 'date_entered')->widget(\yii\jui\DatePicker::classname(),
                                    ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'entered_by')->textInput([
                                        'placeholder' => 'test User',
                                        'value' => 'test user'
                                    ]); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'travel_required')->checkbox(['value' => 1]); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'revised')->textInput(); ?>
                            </div>

                            <div class="form-group">
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
                                <?= $form->field($events, 'state')->dropDownList(ArrayHelper::map([
                                            [
                                                'stateId' => 1,
                                                'state' => 'Test state'
                                            ],
                                            ['stateId' => 2, 'state' => 'Demo State']
                                        ], 'stateId', 'state'), ['prompt' => '--Choose Type--']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($events, 'account_num')->textInput()->label('Account Number'); ?>
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