<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Class VehicleStatusForm
 * @package app\models
 */
class VehicleStatusForm extends Model {
    public $statusCode;
    public $statusDescription;
    public $id;

    /**
     * rules
     * @return array
     */
    public function rules() {
        return [[['statusCode','statusDescription'], 'required'],
         [['id'],'safe']];
    }
}