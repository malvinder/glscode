<?php
use yii\helpers\Html;

?>
<div id="content" class="app-content" role="main">
    <div class="app-content-body ">

        <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Events List</h1>
            <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/event/add">
                <button class="btn btn-primary btn-addon btn-lg" style="float: right; margin-top: -35px;"><i
                        class="fa fa-plus"></i>New Event
                </button>
            </a>
        </div>
        <div class="wrapper-md">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Events List

                </div>
                <div class="table-responsive">
                    <table ui-jq="dataTable" class="table table-striped b-t b-b">
                        <thead>
                        <th>ID</th>
                        <th>Event_name</th>
                        <th>Organized By</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Location</th>
                        <th>View</th>

                        </thead>

                        <?php
                        foreach ($events as $event): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$event->id}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->event_name}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->organized_by}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->start_date}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->end_date}"); ?>
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->location}"); ?>
                                </td>
                                <td>
                                    <a href="<?php echo yii::$app->request->baseUrl; ?>/index.php/vehicles/event/view/<?php echo $event->id; ?>"><i class="fa fa-eye dim-view"></i></a>
                                </td>


                            </tr>

                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.dim-view{ color: #23be75; }
</style>