<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property string $serial
 * @property integer $number
 * @property string $expires_date
 * @property string $release_date
 * @property string $using_date
 * @property double $cash
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial', 'expires_date', 'release_date', 'using_date','status', 'cash'], 'required'],
            [['expires_date', 'release_date', 'using_date'], 'safe'],
            [['cash'], 'number'],
            [['serial'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serial' => 'Serial',
            'number' => 'Number',
            'expires_date' => 'Expires Date',
            'release_date' => 'Release Date',
            'using_date' => 'Using Date',
            'cash' => 'Cash',
        ];
    }
}
