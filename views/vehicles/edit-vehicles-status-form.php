<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Edit Vehicle Status</div>
        <div class="panel-body">

<?php
// Form start
$form = ActiveForm::begin();

?>
<div class="form-group">
<!-- Create hidden button for id-->
<?= $form->field($model, 'id')->hiddenInput(array('value' => $vehiclesStatusTable->id))->label(false) ?>
</div>
<div class="form-group">
<!-- Assign status code to field -->
<?= $form->field($model, 'statusCode')->textInput(array('value' => $vehiclesStatusTable->status_code)) ?>
</div>
<div class="form-group">
<!-- Assign value for description textarea -->
<?php $model->statusDescription = $vehiclesStatusTable->status_description; ?>
</div>
<div class="form-group">
<?= $form->field($model, 'statusDescription')->textarea(array()) ?>
</div>


<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<!-- Form end -->
<?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
