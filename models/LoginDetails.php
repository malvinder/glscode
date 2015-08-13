<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_details".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property integer $user_type
 *
 * @property Events[] $events
 * @property Events[] $events0
 * @property UserTypes $userType
 * @property PersonalDetails[] $personalDetails
 * @property UserLoginLog[] $userLoginLogs
 * @property VehicleHistory[] $vehicleHistories
 * @property VehicleInventory[] $vehicleInventories
 * @property VehiclePlateAssigned[] $vehiclePlateAssigneds
 * @property VehiclePlateAssigned[] $vehiclePlateAssigneds0
 */
class LoginDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'user_type'], 'required'],
            [['status', 'user_type'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => '0: active1: inactive2: authorized3: blocked4: password',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['coordinator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents0()
    {
        return $this->hasMany(Events::className(), ['evr_coordinator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetails()
    {
        return $this->hasMany(PersonalDetails::className(), ['userId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLoginLogs()
    {
        return $this->hasMany(UserLoginLog::className(), ['userId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleHistories()
    {
        return $this->hasMany(VehicleHistory::className(), ['received_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleInventories()
    {
        return $this->hasMany(VehicleInventory::className(), ['coordinator' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlateAssigneds()
    {
        return $this->hasMany(VehiclePlateAssigned::className(), ['assigned_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlateAssigneds0()
    {
        return $this->hasMany(VehiclePlateAssigned::className(), ['unassigned_by' => 'id']);
    }
}
