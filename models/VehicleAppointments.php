<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_appointments".
 *
 * @property string $appointment_id
 * @property integer $event_id
 * @property integer $vehicle_id
 *
 * @property Events $event
 * @property VehicleInventory $vehicle
 * @property VehicleShipping[] $vehicleShippings
 */
class VehicleAppointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles_appointment_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'vehicle_id'], 'required'],
            [['event_id', 'vehicle_id'], 'integer'],
            [['delivery_date', 'pick_up_date'], 'date'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'event_id' => 'Event ID',
            'vehicle_id' => 'Vehicle ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Events::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleInventory::className(), ['id' => 'vehicle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleShippings()
    {
        return $this->hasMany(VehicleShipping::className(), ['appointment_id' => 'appointment_id']);
    }
}
