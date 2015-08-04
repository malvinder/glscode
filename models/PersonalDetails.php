<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal_details".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $fullname
 * @property string $email
 * @property string $mobile
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $pincode
 *
 * @property LoginDetails $user
 */
class PersonalDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'fullname', 'email'], 'required'],
            [['userId'], 'integer'],
            [['address'], 'string'],
            [['fullname'], 'string', 'max' => 75],
            [['email'], 'string', 'max' => 150],
            [['mobile'], 'string', 'max' => 15],
            [['city', 'state'], 'string', 'max' => 25],
            [['pincode'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'userId']);
    }
}
