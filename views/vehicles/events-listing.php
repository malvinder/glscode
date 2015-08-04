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
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <th>ID</th>
                        <th>Event_name</th>
                        <th>Organized By</th>
                        <th>Event Date</th>
                        <th>Event Time</th>
                        <th>Location</th>
                        </thead>

                        <?php
                        foreach ($events as $event): ?>
                            <tr>
                                <td>
                                    <?php echo Html::encode("{$event->id}"); ?>:
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->event_name}"); ?>:
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->organized_by}"); ?>:
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->event_date}"); ?>:
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->event_time}"); ?>:
                                </td>
                                <td>
                                    <?php echo Html::encode("{$event->location}"); ?>:
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