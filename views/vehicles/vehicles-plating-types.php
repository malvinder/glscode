<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">

        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Vehicles Plating Type</h1>
        </div>
        <div class="wrapper-md">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Vehicles Plating Type
                </div>
                <div class="table-responsive">
                    <table ui-jq="dataTable" class="table table-striped b-t b-b">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Plate Type</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($vehiclePlatingTypes as $vehiclePlatingType): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$vehiclePlatingType->id}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$vehiclePlatingType->plate_type}"); ?>
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