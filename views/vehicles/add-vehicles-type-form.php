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
        <div class="panel-heading font-bold">Add Vehicle Type</div>
        <div class="panel-body">

<?php
// Form start
$form = ActiveForm::begin();

?>
<!-- Form field -->
<div class="form-group">
<?= $form->field($model, 'type') ?>
</div>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<!-- End form -->
<?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
   </div>
  </div>
 </div>
</div>
