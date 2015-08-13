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

                                <?= $form->field($model, 'vehicle_id')->dropDownList(ArrayHelper::map($allVinNumber, 'id', 'vin'), ['prompt' => '--Choose Type--'])->label('Select Vin'); ?>
                            </div>


                            <div class="form-group">
                                <?= $form->field($model, 'vin')->textInput(['name'=> 'VehiclesAppointmentForm[vin][]']); ?>
                            </div>


                            <div class="form-group">
                                <?= Html::textInput('Transport Type','shipment',['label'=>'Transport Type']) ?>
                            </div>


                            <div class="form-group">
                                <!-- scheduled date -->
                                <?= $form->field($model, 'scheduled_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>
                            <div class="form-group">
                                <!-- pickup date -->
                                <?= $form->field($model, 'received_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>

                            <div class="form-group">
                                <!-- delivery date -->
                                <?= $form->field($model, 'released_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
                            </div>

                             <div class="form-group">
                                <!-- fuel level  -->
                                <?= $form->field($model, 'released_mileage')->textInput(['name'=> 'VehiclesAppointmentForm[released_mileage][]']); ?>
                            </div>

                            <div class="form-group">
                                <!-- return data -->
                                <?= $form->field($model, 'vehicle_returned')->textInput(['name' => 'VehiclesAppointmentForm[vehicle_returned][]']); ?>
                            </div>

                            <div class="form-group">
                                <!-- return data -->
                                <?= $form->field($model, 'plate_number')->textInput(['name' => 'VehiclesAppointmentForm[plate_number][]']); ?>
                            </div>

                             <div class="form-group">
                                <!-- client name -->
                                <?= $form->field($model, 'contact_name')->textInput(['name' => 'VehiclesAppointmentForm[contact_name][]']); ?>
                            </div>

                            <div class="form-group">
                                <!-- coordinator -->
                                <?= $form->field($model, 'coordinator')->textInput(['name' => 'VehiclesAppointmentForm[coordinator]']); ?>
                            </div>
                            <div class="form-group">
                                <!-- coordinator -->
                                <?= Html::dropDownList('material_required',['0' => 'NO'],['label' => 'Material Required']); ?>
                            </div>

                            <div class="form-group">
                                <!-- coordinator -->
                                <?= $form->field($model, 'vdate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']);

                                ?>
                            </div>

                            <div class="form-group">
                                <?= Html::Button('Add More', ['class' => 'btn btn-primary','id' => 'addMoreAppointment']) ?>
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

<?php
// Add js file
$this->registerJsFile(yii::$app->request->baseUrl . '/js/vehicleAppointment.js', ['depends' => [yii\web\JqueryAsset::className()]]); ?>
