<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1>Countries</h1>
    <ul>
        <?php
        foreach ($vehiclesType as $vehicleType): ?>
            <li>
                <?= Html::encode("{$vehicleType->id} ({$vehicleType->types})") ?>:
            </li>
        <?php endforeach; ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>