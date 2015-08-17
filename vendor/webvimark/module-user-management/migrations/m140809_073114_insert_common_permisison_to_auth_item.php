<?php

use webvimark\modules\UserManagement\models\rbacDB\Permission;
use yii\db\Migration;

class m140809_073114_insert_common_permisison_to_auth_item extends Migration
{
    public function safeUp()
    {
        Permission::create(Yii::$app->getModule('user-management')->commonPermissionName);
    }

    public function safeDown()
    {
        $permission = Permission::findOne(['name' => Yii::$app->getModule('user-management')->commonPermissionName]);

        if ($permission) {
            $permission->delete();
        }
    }
}
