<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $job_number
 * @property integer $travel_required
 * @property string $revised
 * @property string $date_entered
 * @property string $entered_by
 * @property string $event_name
 * @property string $organized_by
 * @property string $start_date
 * @property string $end_date
 * @property string $location
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $account_num
 * @property string $short_code
 * @property string $contact_name
 * @property string $customer_phone
 * @property integer $coordinator
 * @property integer $evr_coordinator
 * @property string $evr_date
 *
 * @property LoginDetails $coordinator0
 * @property LoginDetails $evrCoordinator
 * @property VehicleShipping[] $vehicleShippings
 * @property VehiclesAppointmentDetails[] $vehiclesAppointmentDetails
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'job_number',
                    'travel_required',
                    'revised',
                    'date_entered',
                    'entered_by',
                    'event_name',
                    'start_date',
                    'coordinator'
                ],
                'required'
            ],
            [['travel_required', 'coordinator', 'evr_coordinator'], 'integer'],
            [['date_entered', 'start_date', 'end_date', 'evr_date'], 'safe'],
            [['location', 'address'], 'string'],
            [['job_number', 'revised', 'entered_by'], 'string', 'max' => 255],
            [['event_name'], 'string', 'max' => 75],
            [['organized_by'], 'string', 'max' => 60],
            [['city', 'short_code', 'customer_phone'], 'string', 'max' => 25],
            [['state'], 'string', 'max' => 5],
            [['account_num'], 'string', 'max' => 30],
            [['contact_name'], 'string', 'max' => 65]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_number' => 'Job Number',
            'travel_required' => 'Travel Required',
            'revised' => 'Revised',
            'date_entered' => 'Date Entered',
            'entered_by' => 'Entered By',
            'event_name' => 'Event Name',
            'organized_by' => 'Organized By',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'location' => 'Location',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'account_num' => 'Account Num',
            'short_code' => 'Short Code',
            'contact_name' => 'Contact Name',
            'customer_phone' => 'Customer Phone',
            'coordinator' => 'Coordinator',
            'evr_coordinator' => 'Evr Coordinator',
            'evr_date' => 'Evr Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordinator0()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'coordinator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvrCoordinator()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'evr_coordinator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleShippings()
    {
        return $this->hasMany(VehicleShipping::className(), ['event' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclesAppointmentDetails()
    {
        return $this->hasMany(VehiclesAppointmentDetails::className(), ['event_id' => 'id']);
    }
}
