<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">

        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Vehicles Status</h1>
        </div>
        <div class="wrapper-md">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vehicles Status
                </div>
                <div class="table-responsive">
                    <table ui-jq="dataTable" class="table table-striped b-t b-b">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Code</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($vehiclesStatus as $vehicleType): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$vehicleType->id}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehicleType->status_code}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehicleType->status_description}"); ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
