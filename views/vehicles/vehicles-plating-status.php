<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">


        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Vehicle Plating Status</h1>
        </div>
        <div class="wrapper-md">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">

                            <thead>
                            <th>ID</th>
                            <th>Types</th>
                            </thead>

                            <?php
                            foreach ($vehiclePlatingStatus as $vehiclePlatingStatusSingle): ?>
                                <tr>
                                    <td>
                                        <?php echo Html::encode("{$vehiclePlatingStatusSingle->id}"); ?>
                                    </td>
                                    <td>
                                        <?php echo Html::encode("{$vehiclePlatingStatusSingle->plate_status}"); ?>
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
