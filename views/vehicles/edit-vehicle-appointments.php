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
                        <div class="panel-heading font-bold">Add Vehicles Appointment</div>
                        <div class="panel-body">

                            <?php $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                                <?= $form->field($vehicleAppointments, 'appointment_id')->textInput(); ?>
                            </div>

                            <div class="form-group">
                                <?= $form->field($vehicleAppointments, 'event_id')->dropDownList(ArrayHelper::map($events, 'id', 'event_name'), ['prompt' => '--Choose Type--']); ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($vehicleAppointments, 'vehicle_id')->dropDownList(ArrayHelper::map($vehicleInventory, 'id', 'vin'), ['prompt' => '--Choose Type--']); ?>
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