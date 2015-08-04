<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class VehicleTypeForm
 * @package app\models
 */
class VehicleTypeForm extends Model {
    public $type;
    public $id;

    /**
     * rules
     * @return array
     */
    public function rules() {
        return [[['type'], 'required'],
        [['id'],'safe']];
    }
}