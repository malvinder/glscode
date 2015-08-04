<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/*echo '<pre>';print_r($model->id = $vehiclesTypeTable->id );die;*/

?>
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">
  <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">Edit Vehicle Type</div>
        <div class="panel-body">

<?php $form = ActiveForm::begin();

?>
<div class="form-group">
<?= $form->field($model, 'id')->hiddenInput(array('value'=> $vehiclesTypeTable->id))->label(false) ?>
</div>
<div class="form-group">
<?= $form->field($model, 'type')->textInput(array('value'=> $vehiclesTypeTable->types)) ?>
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
