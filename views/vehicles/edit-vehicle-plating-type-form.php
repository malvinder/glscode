<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Edit Vehicle Plating</div>
        <div class="panel-body">

<?php $form = ActiveForm::begin(); ?>
<div class="form-group">
<?= $form->field($vehiclePlatingType, 'id')->hiddenInput()->label(false); ?>
</div>
<div class="form-group">
<?= $form->field($vehiclePlatingType, 'plate_type')->textInput(); ?>
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
