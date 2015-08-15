<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "operations".
 *
 * @property integer $id
 * @property string $serial_number
 * @property string $using_date
 * @property double $debit_kredit
 */
class Operations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['serial_number', 'using_date', 'debit_kredit'], 'required'],
            [['using_date'], 'safe'],
            [['debit_kredit'], 'number'],
            [['serial_number'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'using_date' => 'Using Date',
            'debit_kredit' => 'Debit Kredit',
        ];
    }
}
