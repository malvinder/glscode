<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PersonalDetails;
use app\models\VehicleStatus;
use app\models\VehiclesType;
use yii\jui\DatePicker;
use app\models\VehiclePlateNumber;
use app\models\VehiclePlatingStatus;
use app\models\VehicleAppointments;
use app\models\Events;

?>


  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicles Receiving Form</div>
        <div class="panel-body">

<!-- Form start -->
<?php  $form = ActiveForm::begin(
    [   'options' => [
            'class' => 'vehiclesInventoryForm'
        ]
    ]);?>

<!-- ------------------------------------ Vehicles Receiving Form --------------------------------------------------------- -->
<fieldset>
 
    <div class="form-group">
        <?= Html::label('Find Vehicle By Vin Number'); ?>
        <?= Html::textInput('vinNumber', NULL, array('class' => 'vinNumber')); ?>
        <?= Html::Button('Search', ['class' => 'btn btn-primary searchByVinNumber']); ?>
    </div>
    <div class="control-group">
       <?= $form->field($vehicleInventory, 'id')->hiddenInput()->label(false) ?>
        <?= $form->field($vehicleInventory, 'vin'); ?>
        <?= $form->field($vehicleInventory, 'model'); ?>
        <?= $form->field($vehicleInventory, 'make'); ?>
        <?= $form->field($vehicleInventory, 'year'); ?>
        <?= $form->field($vehicleInventory, 'color'); ?>
        <?= $form->field($vehicleInventory, 'type')->dropDownList(ArrayHelper::map(VehiclesType::find()->all(), 'id', 'types'), ['prompt' => '--Choose Type--']); ?>
        <?= $form->field($vehicleInventory, 'coordinator')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'), ['prompt' => '--Choose User--']); ?>
        <?= $form->field($vehicleInventory, 'status')->dropDownList(ArrayHelper::map(VehicleStatus::find()->all(), 'id', 'status_description', 'status_code'), ['prompt' => '--Choose Status--']); ?>
        <?= $form->field($vehicleInventory, 'restricted'); ?>
    </div>
</fieldset>

      </div>
    </div>
   </div>
<!-------------------------------------- End Of Vehicles Receiving Form --------------------------------------------------- -->


<div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicle History</div>
        <div class="panel-body">
<!-------------------------------------- Vehicle History Form ------------------------------------------------------------- -->
<fieldset>
   
    <div class="control-group">
        <?= $form->field($vehicleHistory, 'id')->hiddenInput()->label(false) ?>
        <?= $form->field($vehicleHistory, 'received_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($vehicleHistory, 'received_mileage') ?>
        <?= $form->field($vehicleHistory, 'received_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'), ['prompt' => '--Choose User--']); ?>
        <?= $form->field($vehicleHistory, 'released_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($vehicleHistory, 'released_mileage') ?>
        <?= $form->field($vehicleHistory, 'date_added')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
    </div>
</fieldset>

      </div>
    </div>
   </div>
<!----------------------------------- End Of Vehicle History Form ---------------------------------------------------------- -->


<div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicle Plating</div>
        <div class="panel-body">
<!-------------------------------------- Vehicle Plating Form ------------------------------------------------------------- -->
<fieldset>
   
    <div class="control-group">
        <?= $form->field($vehiclePlating, 'id')->hiddenInput()->label(false) ?>
        <?= $form->field($vehiclePlating, 'date_assigned')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($vehiclePlating, 'assigned_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'), ['prompt' => '--Choose User--']); ?>
        <?= $form->field($vehiclePlating, 'date_unassigned')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($vehiclePlating, 'unassigned_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'), ['prompt' => '--Choose User--']); ?>
        <?= $form->field($vehiclePlating, 'plate_number')->dropDownList(ArrayHelper::map(VehiclePlateNumber::find()->all(), 'id', 'plate_number'), ['prompt' => '--Choose Plate--']); ?>
        <?= $form->field($vehiclePlating, 'plate_status')->dropDownList(ArrayHelper::map(VehiclePlatingStatus::find()->all(), 'id', 'plate_status'), ['prompt' => '--Update Status--']); ?>

    </div>
</fieldset>

      </div>
    </div>
   </div>
<!-----------------------------------End Of Vehicle Plating Form ----------------------------------------------------------- -->


<div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicle Shipping</div>
        <div class="panel-body">
<!-------------------------------------- Vehicle Shipping Form ------------------------------------------------------------ -->
<fieldset>
    
    <div class="control-group">
        <?= $form->field($vehicleShipping, 'id')->hiddenInput()->label(false) ?>
        <?= $form->field($vehicleShipping, 'vdate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($vehicleShipping, 'who')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'), ['prompt' => '--Choose User--']); ?>
        <?= $form->field($vehicleShipping, 'scheduled_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>

        <?= $form->field($vehicleShipping, 'vehicle_plate')->dropDownList(ArrayHelper::map(VehiclePlateNumber::find()->all(), 'id', 'plate_number'), ['prompt' => '--Choose Plate--']); ?>
        <?= $form->field($vehicleShipping, 'event')->dropDownList(ArrayHelper::map(Events::find()->all(), 'id', 'event_name'), ['prompt' => '--Choose Event--', 'class' => 'eventDropDownInVehiclesInfo']); ?>
        <?= $form->field($events, 'organized_by') ?>
        <?= $form->field($events, 'location') ?>
        <?= $form->field($events, 'start_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
        <?= $form->field($events, 'end_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>

        <?= $form->field($vehicleShipping, 'comments')->textArea(); ?>

    </div>
</fieldset>
<!-------------------------------------- End Of Vehicle Shipping Form -------------------------------------------------------->

<!-- Form submit button -->
<div class="form-group">
    <?= Html::submitButton('Add Vehicle', ['class' => 'btn btn-primary']); ?>
</div>

<!--Form ends here -->
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
$this->registerJsFile(yii::$app->request->baseUrl . '/js/vehiclesinventory.js', ['depends' => [yii\web\JqueryAsset::className()]]); ?>