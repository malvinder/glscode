<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Events List</h1>
        </div>
        <div class="wrapper-md">
            <?php
            foreach ($events as $event): ?>
            <div class="row">
                <h1 class="m-n font-thin h3"><?php echo Html::encode("{$event->event_name}"); ?></h1>
           <?php if(count($event->vehicleShippings)): ?>
                <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                <thead>
                <th>id</th>
                <th>vin</th>
                <th>model</th>
                <th>make</th>
                <th>year</th>
                <th>color</th>
              </thead>
            <?php foreach ($event->vehicleShippings as $vehicleShippings):
                    ?>
                <tr>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->id}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->vin}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->model}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->make}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->year}"); ?>
                    </td>
                    <td>
                        <?php echo Html::encode("{$vehicleShippings->vehicle->color}"); ?>
                    </td>

                </tr>

            <?php    endforeach; ?>
           </table></div>
               </div>
                <?php
            endif;
            endforeach;

            ?>

                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>
        </div>
    </div>
