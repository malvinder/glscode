<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Edit Vehicle Plate Number</div>
        <div class="panel-body">

<?php $form = ActiveForm::begin();
?>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'id')->hiddenInput()->label(false); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'plate_number')->textInput(); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'plate_installed')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'type')->dropDownList(ArrayHelper::map($vehiclePlatingType, 'id', 'plate_type'), ['prompt' => '--Choose Type--']); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'expiration')->widget(\yii\jui\DatePicker::classname(), ['dateFormat' => 'yyyy-MM-dd']); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'status')->dropDownList(ArrayHelper::map($vehiclePlatingStatus, 'id', 'plate_status'), ['prompt' => '--Choose Status--']); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlateNumber, 'comments')->textarea(); ?>
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
