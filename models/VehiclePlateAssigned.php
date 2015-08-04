<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_plate_assigned".
 *
 * @property string $id
 * @property integer $vehicleId
 * @property string $date_assigned
 * @property integer $assigned_by
 * @property string $date_unassigned
 * @property integer $unassigned_by
 * @property integer $plate_number
 * @property integer $plate_status
 *
 * @property VehicleInventory $vehicle
 * @property LoginDetails $assignedBy
 * @property LoginDetails $unassignedBy
 * @property VehiclePlateNumber $plateNumber
 * @property VehiclePlatingStatus $plateStatus
 */
class VehiclePlateAssigned extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_plate_assigned';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicleId'], 'required'],
            [['vehicleId', 'assigned_by', 'unassigned_by', 'plate_number', 'plate_status'], 'integer'],
            [['date_assigned', 'date_unassigned','id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicleId' => 'Vehicle ID',
            'date_assigned' => 'Date Assigned',
            'assigned_by' => 'Assigned By',
            'date_unassigned' => 'Date Unassigned',
            'unassigned_by' => 'Unassigned By',
            'plate_number' => 'Plate Number',
            'plate_status' => 'Plate Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleInventory::className(), ['id' => 'vehicleId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedBy()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'assigned_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnassignedBy()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'unassigned_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlateNumber()
    {
        return $this->hasOne(VehiclePlateNumber::className(), ['id' => 'plate_number']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlateStatus()
    {
        return $this->hasOne(VehiclePlatingStatus::className(), ['id' => 'plate_status']);
    }
}
