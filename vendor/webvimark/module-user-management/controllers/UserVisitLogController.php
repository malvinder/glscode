<?php

namespace webvimark\modules\UserManagement\controllers;

use webvimark\components\AdminDefaultController;
use webvimark\modules\UserManagement\models\search\UserVisitLogSearch;
use webvimark\modules\UserManagement\models\UserVisitLog;
use Yii;

/**
 * UserVisitLogController implements the CRUD actions for UserVisitLog model.
 */
class UserVisitLogController extends AdminDefaultController
{
    /**
     * @var UserVisitLog
     */
    public $modelClass = 'webvimark\modules\UserManagement\models\UserVisitLog';

    /**
     * @var UserVisitLogSearch
     */
    public $modelSearchClass = 'webvimark\modules\UserManagement\models\search\UserVisitLogSearch';

    public $enableOnlyActions = ['index', 'view', 'grid-page-size'];
}
