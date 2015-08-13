<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class VehicleStatusForm
 * @package app\models
 */
class VehiclesAppointmentForm extends Model
{
    public $event_id;
    public $vehicle_id;
    public $vin_drop_down;
    public $vin;
    public $scheduled_date;
    public $pick_up_date;
    public $vehicle_returned;
    public $delivery_date;
    public $prep_level;
    public $fuel_level;
    public $plate_number;
    public $contact_name;
    public $coordinator;
    public $vdate;
    public $transport_type;
    public $material_required;

    /**
     * rules
     * @return array
     */
    public function rules()
    {
        return [[['vehicle_id','pick_up_date','delivery_date'], 'required'],
            [['event_id','vehicle_id','vin','transport_type'],'safe'],
            [['prep_level', 'fuel_level', 'transport_type','vin'], 'string'],
            [['material_required'], 'integer'],
        ];
    }
}