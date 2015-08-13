<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Events;
use app\models\PersonalDetails;
use app\models\VehiclePlateNumber;
use yii\jui\DatePicker;
?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicle Shipping</div>
        <div class="panel-body">

<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
<?= $form->field($model, 'vehicleId', ['inputOptions' => ['value'=>$vehicleId]])->textInput(['readonly'=>true]); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'vdate')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'who')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'),['prompt'=>'--Choose User--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'scheduled_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'scheduled_time') ?>
</div>
<div class="form-group">
<?= $form->field($model, 'vehicle_plate')->dropDownList(ArrayHelper::map(VehiclePlateNumber::find()->all(), 'id', 'plate_number'),['prompt'=>'--Choose Plate--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'event')->dropDownList(ArrayHelper::map(Events::find()->all(), 'id', 'event_name'),['prompt'=>'--Choose Event--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'comments')->textArea(); ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Add Shipping Details', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
