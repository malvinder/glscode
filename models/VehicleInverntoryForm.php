<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class VehicleStatusForm
 * @package app\models
 */
class VehicleInventoryForm extends Model {
    public $id;
    public $model;
    public $make;
    public $year;
    public $color;
    public $type;
    public $coordinator;
    public $status;
    public $restricted;



    /**
     * rules
     * @return array
     */
    public function rules() {
        return [
            [['vin', 'model', 'make', 'year', 'color', 'type', 'status', 'restricted'], 'required'],
            [['year'], 'safe'],
            [['type', 'coordinator', 'status', 'restricted'], 'integer'],
            [['vin'], 'string', 'max' => 40],
            [['model'], 'string', 'max' => 30],
            [['make'], 'string', 'max' => 25],
            [['color'], 'string', 'max' => 15],
            [['vin'], 'unique']
        ];
    }
}