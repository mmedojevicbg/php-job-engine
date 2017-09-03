<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_recipient".
 *
 * @property integer $id
 * @property string $email
 * @property integer $job_id
 * @property integer $notify_on_success
 * @property integer $notify_on_failure
 *
 * @property PjeJob $job
 */
class PjeRecipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'job_id'], 'required'],
            [['job_id', 'notify_on_success', 'notify_on_failure'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeJob::className(), 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'job_id' => 'Job ID',
            'notify_on_success' => 'Notify On Success',
            'notify_on_failure' => 'Notify On Failure',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(PjeJob::className(), ['id' => 'job_id']);
    }
}
