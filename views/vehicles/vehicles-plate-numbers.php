<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">
        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Vehicles Plate Numbers</h1>
        </div>
        <div class="wrapper-md">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Plate number</th>
                            <th>Plate installed</th>
                            <th>Plate expiration</th>
                            <th>Plate type</th>
                            <th>Plate status</th>
                            <th>Plate comments</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($vehiclesPlateNumbers as $vehiclesPlateNumber): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->id}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->plate_number}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->plate_installed}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->expiration}"); ?>
                                </td>

                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->type0->plate_type}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->status0->plate_status}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclesPlateNumber->comments}"); ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </table>
                </div>
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>
        </div>
    </div>
</div>
