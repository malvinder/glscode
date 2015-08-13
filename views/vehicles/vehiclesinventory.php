<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PersonalDetails;
use app\models\VehicleStatus;
use app\models\VehiclesType;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vehicles Receiving Form</title>
</head>
<body>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'vin'); ?>
<?= $form->field($model, 'model'); ?>
<?= $form->field($model, 'make'); ?>
<?= $form->field($model, 'year'); ?>
<?= $form->field($model, 'color'); ?>
<?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(VehiclesType::find()->all(), 'id', 'types'),['prompt'=>'--Choose Type--']); ?>
<?= $form->field($model, 'coordinator')->dropDownList(ArrayHelper::map(PersonalDetails::find()->all(), 'userId', 'fullname'),['prompt'=>'--Choose User--']); ?>
<?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(VehicleStatus::find()->all(), 'id', 'status_description','status_code'),['prompt'=>'--Choose Status--']); ?>
<?= $form->field($model, 'restricted'); ?>
<div class="form-group">
    <?= Html::submitButton('Add Vehicle to Inventory', ['class' => 'btn btn-primary']); ?>
</div>
<?php ActiveForm::end(); ?>
</body>
</html>