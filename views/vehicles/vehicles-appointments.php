<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Vehicles Appointment</h1>
        </div>
        <div class="wrapper-md">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Event</th>
                            <th>Vehicle Vin</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($vehicleAppointments as $vehicleAppointment): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$vehicleAppointment->appointment_id}"); ?>
                                </td>
                                <td>
                                    <?php
                                    echo Html::encode("{$vehicleAppointment->event->event_name}"); ?>
                                </td>
                                <td>
                                    <?php
                                    echo Html::encode("{$vehicleAppointment->vehicle->vin}"); ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?= LinkPager::widget(['pagination' => $pagination]) ?>
            </div>
        </div>
    </div>
</div>
