<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VehiclePlatingStatus;
use app\models\VehiclePlateNumber;
use app\models\PersonalDetails;
use yii\jui\DatePicker;
?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Add Vehicle Plate Number</div>
        <div class="panel-body">
<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
<?= $form->field($model, 'vehicleId', ['inputOptions' => ['value'=>$vehicleId]])->textInput(['readonly'=>true]); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'date_assigned')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'assigned_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'),['prompt'=>'--Choose User--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'date_unassigned')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'unassigned_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'),['prompt'=>'--Choose User--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'plate_number')->dropDownList(ArrayHelper::map(VehiclePlateNumber::find()->all(), 'id', 'plate_number'),['prompt'=>'--Choose Plate--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'plate_status')->dropDownList(ArrayHelper::map(VehiclePlatingStatus::find()->all(), 'id', 'plate_status'),['prompt'=>'--Update Status--']); ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Install Plate to Vehicle', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
