<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tickers}}".
 *
 * @property int $id
 * @property float $bbp Лучший бид
 * @property float $bap Лучшее предложение
 * @property string $created_at
 */
class Tickers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tickers}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bbp', 'bap', 'created_at'], 'required'],
            [['bbp', 'bap'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

}
