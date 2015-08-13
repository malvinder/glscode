<?php
/* @var $this yii\web\View */
use yii\helpers\BaseUrl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\UserTypes;
?>
<h1>Register User</h1>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($login, 'username'); ?>
<?= $form->field($login, 'password')->passwordInput(); ?>
<?= $form->field($login, 'user_type')->dropDownList(ArrayHelper::map(UserTypes::find()->all(), 'id', 'types'),['prompt'=>'--Choose Type--']);?>
<?= $form->field($personal, 'fullname'); ?>
<?= $form->field($personal, 'email'); ?>
<?= $form->field($personal, 'mobile'); ?>
<?= $form->field($personal, 'address')->textArea(); ?>
<?= $form->field($personal, 'city'); ?>
<?= $form->field($personal, 'state'); ?>
<?= $form->field($personal, 'pincode'); ?>
<div class="form-group">
    <?= Html::submitButton('Register', ['class' => 'btn btn-info']); ?>
</div>
<?php ActiveForm::end(); ?>