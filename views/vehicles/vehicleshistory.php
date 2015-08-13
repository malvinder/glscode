<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\VehicleStatus;
use app\models\VehiclesType;
use app\models\PersonalDetails;
use yii\jui\DatePicker;
?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Vehicle History</div>
        <div class="panel-body">
<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
<?= $form->field($model, 'vehicleId', ['inputOptions' => ['value'=>$vehicleId]])->textInput(['readonly'=>true]); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'received_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'received_mileage') ?>
</div>
<div class="form-group">
<?= $form->field($model, 'received_by')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'),['prompt'=>'--Choose User--']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'released_date')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($model, 'released_mileage') ?>
</div>
<div class="form-group">
<?= $form->field($model, 'date_added')->widget(\yii\jui\DatePicker::classname(), ['dateFormat'=>'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
    <?= Html::submitButton('Receive Vehicle', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
