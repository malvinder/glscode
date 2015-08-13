<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

?>

<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="wrapper-md" ng-controller="FormDemoCtrl">
            <div class="row">

                <!-- Nav tabs -->
                <ul id="myTab" class="nav nav-tabs">
                    <li role="presentation" class="<?php if ($tab == 1) echo 'active'; ?>"><a href="#viewEvent"  role="tab"
                                                              data-toggle="tab">View Event</a></li>
                    <li role="presentation"><a href="#addAppointment"  role="tab" data-toggle="tab">Add Appointment</a>
                    </li>
                    <li role="presentation" class="<?php if ($tab == 3) echo 'active'; ?>"><a href="#listOfAppointment"  role="tab" data-toggle="tab">List Appointments</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane in <?php if($tab == 1) echo 'active';?>" id="viewEvent">

                    <div class="wrapper-md">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                View Event
                            </div>
                            <div class="table-responsive">
                                <table ui-jq="dataTable" class="table table-striped b-t b-b">
                                    <thead>
                                    <th>ID</th>
                                    <th>Event_name</th>
                                    <th>Organized By</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Location</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Account Number</th>
                                    <th>Short Code</th>
                                    <th>Contact Name</th>
                                    <th>Customer Phone</th>
                                    <th>Coordinator</th>
                                    <th>EvrCoordinator</th>
                                    <th>Evr Date</th>
                                    </thead>
                                    <tr>
                                        <td>
                                            <?php echo Html::encode("{$event->id}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->event_name}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->organized_by}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->start_date}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->end_date}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->location}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->address}"); ?>
                                        </td>

                                        <td>
                                            <?php echo Html::encode("{$event->city}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->state}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->account_num}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->short_code}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->contact_name}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->customer_phone}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->coordinator0->personalDetails[0]->fullname}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->evrCoordinator->personalDetails[0]->fullname}"); ?>
                                        </td>
                                        <td>
                                            <?php echo Html::encode("{$event->evr_date}"); ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="addAppointment">
                <div class="bg-light lter b-b wrapper-md">
                    <h1 class="m-n font-thin h3">Add Vehicles Appointment</h1>
                </div>
                <div class="wrapper-md">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add Vehicles Appointment
                    </div>
                    <div class="row wrapper">
                        <div class="col-sm-3 m-b-xs">

                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= Html::Button('Schedule Porter', ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?= Html::Button('View Porter Shippers', ['class' => 'btn btn-primary']); ?>

                            </div>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin(
                        ['options' => [
                            'class' => 'addvehiclesAppointmentForm'
                        ]
                        ]);?>

                    <div class="table-responsive">

                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>

                                <th>Select Vin</th>
                                <th><p>Vin</p><p>Transport Type</p></th>
                                <th><p>Requested</p> <p>Date/Time</p></th>
                                <th><p>Scheduled</p> <p>Date/Time</p></th>
                                <th><p>Delivery </p> <p>Date/Time</p></th>
                                <th><p>Pick Up </p> <p>Date/Time</p></th>
                                <th><p>Prep Level</p> <p>Fuel Level</p></th>
                                <th><p>Return date</p></th>
                                <th><p>Plate Number</p></th>
                                <th><p>Client Name</p></th>
                                <th><p>Coordinator</p></th>
                                <th><p>Material Required </p></th>
                                <th><p>V Date</p></th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <td><?= $form->field($model, 'vin_drop_down')->dropDownList(ArrayHelper::map($allVinNumber, 'id', 'vin'), ['prompt' => '--Choose Type--', 'name' => 'VehiclesAppointmentForm[0][vin_drop_down]', 'class' => 'searchByVinForAppointment', 'data-indexid' => 0])->label(false); ?></td>



                                <td>
                                    <?= $form->field($model, 'vehicle_id')->hiddenInput(['name' => 'VehiclesAppointmentForm[0][vehicle_id]'])->label(false); ?>
                                    <p><?= $form->field($model, 'vin')->textInput(['disabled' => 'disabled', 'name' => 'VehiclesAppointmentForm[0][vin]'])->label(false); ?>
                                    </p>
                                    <p><?= $form->field($model, 'transport_type')->textInput(['value' => 'shipment', 'name' => 'VehiclesAppointmentForm[0][transport_type]'])->label(false); ?></p>
                                </td>


                                 <td>
                                    <p><?= $form->field($model, 'requested_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => [
                                            'name' => 'VehiclesAppointmentForm[0][requested_date]']])->label(false); ?></p>

                                    <p><?= $form->field($model, 'requested_time')->textInput(['name' => 'VehiclesAppointmentForm[0][requested_time]'])->label(false); ?></p>
                                </td>


                                <td><p><?= $form->field($model, 'scheduled_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => [
                                            'name' => 'VehiclesAppointmentForm[0][scheduled_date]']])->label(false); ?></p>
                                <p><?= $form->field($model, 'scheduled_time')->textInput(['name' => 'VehiclesAppointmentForm[0][scheduled_time]'])->label(false); ?></p>
                                </td>



                                <td><p> <?= $form->field($model, 'delivery_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => [
                                            'name' => 'VehiclesAppointmentForm[0][delivery_date]', 'id' => 'vehiclesappointmentform-delivery_date']])->label(false); ?></p>

                                    <p><?= $form->field($model, 'delivery_time')->textInput(['name' => 'VehiclesAppointmentForm[0][delivery_time]'])->label(false); ?></p>
                                </td>


                                <td><p><?= $form->field($model, 'pick_up_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => [
                                            'name' => 'VehiclesAppointmentForm[0][pick_up_date]', 'id' => 'vehiclesappointmentform-pick_up_date']])->label(false); ?></p>

                                    <p><?= $form->field($model, 'pick_up_time')->textInput(['name' => 'VehiclesAppointmentForm[0][pick_up_time]'])->label(false); ?></p>
                                </td>


                                <td>
                                    <p> <?= $form->field($model, 'prep_level')->textInput(['name' => 'VehiclesAppointmentForm[0][prep_level]'])->label(false); ?></p>

                                    <p><?= $form->field($model, 'fuel_level')->textInput(['name' => 'VehiclesAppointmentForm[0][fuel_level]'])->label(false); ?></p>
                                </td>
                                <td><p><?= $form->field($model, 'vehicle_returned')->textInput(['disabled' => 'disabled', 'name' => 'VehiclesAppointmentForm[0][vehicle_returned]'])->label(false); ?></p></td>
                                <td>
                                    <p> <?= $form->field($model, 'plate_number')->textInput(['disabled' => 'disabled', 'name' => 'VehiclesAppointmentForm[0][plate_number]'])->label(false); ?></p>
                                </td>

                                <td>
                                    <p><?= $form->field($model, 'event_id')->hiddenInput(['name' => 'VehiclesAppointmentForm[0][event_id]'])->label(false); ?>
                                        <?= $form->field($model, 'contact_name')->textInput(['disabled' => 'disabled', 'name' => 'VehiclesAppointmentForm[0][contact_name]'])->label(false); ?></p>

                                </td>

                                <td>
                                    <p><?= $form->field($model, 'coordinator')->textInput(['disabled' => 'disabled', 'name' => 'VehiclesAppointmentForm[0][coordinator]'])->label(false); ?></p>
                                </td>

                                <td>
                                    <p>
                                        <?= $form->field($model, 'material_required')->dropDownList(array('no'), ['name' => 'VehiclesAppointmentForm[0][material_required]'])->label(false); ?>
                                    </p>
                                </td>
                                <td>
                                    <p> <?= $form->field($model, 'vdate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['name' => 'VehiclesAppointmentForm[0][vdate]']])->label(false); ?></p>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-4 hidden-xs">
                                <?= Html::Button('Add More', ['class' => 'btn btn-primary', 'id' => 'addMoreAppointment']); ?>
                            </div>
                            <div class="col-sm-4 text-center">

                            </div>
                            <div class="col-sm-4 text-right text-center-xs">
                                <div class="form-group">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
                                </div>


                            </div>
                        </div>
                    </footer>
                    <?php ActiveForm::end(); ?>
                </div>
                </div>
                    </div>
                <div role="tabpanel" class="tab-pane <?php if ($tab == 3) echo 'active'; ?>" id="listOfAppointment">
                    <div class="bg-light lter b-b wrapper-md">
                        <h1 class="m-n font-thin h3">Appointment List</h1>
                    </div>
                    <div class="wrapper-md">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Appointment List
                            </div>
                    <div class="table-responsive">
                        <table ui-jq="dataTable" class="table table-striped b-t b-b">
                            <thead>
                            <tr>

                                <th>ID</th>
                                <th>Event</th>
                                <th>Vehicle Vin</th>
                                <th>Delivery date</th>
                                <th>Pickup date</th>
                                <th>Transport Type</th>
                                <th>Prep Level</th>
                                <th>Fuel Level</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($vehicleAppointments as $vehicleAppointment): ?>
                                <tr>
                                    <td>
                                        <?php echo Html::encode("{$vehicleAppointment->appointment_id}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->event->event_name}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->vehicle->vin}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->delivery_date}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->pick_up_date}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->transport_type}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->prep_level}"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo Html::encode("{$vehicleAppointment->fuel_level}"); ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
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
<?php
// Add js file
$this->registerJsFile('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', ['depends' => [yii\web\JqueryAsset::className()]]); ?>

