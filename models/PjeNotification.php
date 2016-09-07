<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_notification".
 *
 * @property integer $id
 * @property integer $execution_id
 * @property string $message
 * @property integer $notification_type
 * @property string $notification_date
 *
 * @property PjeExecution $execution
 */
class PjeNotification extends \yii\db\ActiveRecord
{
    const TYPE_SUCCESS = 1;
    const TYPE_INFO = 2;
    const TYPE_WARNING = 3;
    const TYPE_ERROR = 4;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['execution_id'], 'required'],
            [['execution_id', 'notification_type'], 'integer'],
            [['notification_date'], 'safe'],
            [['message'], 'string', 'max' => 255],
            [['execution_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeExecution::className(), 'targetAttribute' => ['execution_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'execution_id' => 'Execution ID',
            'message' => 'Message',
            'notification_type' => 'Notification Type',
            'notification_date' => 'Notification Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecution()
    {
        return $this->hasOne(PjeExecution::className(), ['id' => 'execution_id']);
    }
}
