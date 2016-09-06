<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_execution_step".
 *
 * @property integer $execution_id
 * @property integer $job_step_id
 * @property string $start_time
 * @property string $end_time
 * @property integer $duration
 * @property integer $success
 * @property string $response_message
 *
 * @property PjeExecution $execution
 * @property PjeJobStep $jobStep
 */
class PjeExecutionStep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_execution_step';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['execution_id', 'job_step_id'], 'required'],
            [['execution_id', 'job_step_id', 'duration', 'success'], 'integer'],
            [['start_time', 'end_time'], 'safe'],
            [['response_message'], 'string'],
            [['execution_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeExecution::className(), 'targetAttribute' => ['execution_id' => 'id']],
            [['job_step_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeJobStep::className(), 'targetAttribute' => ['job_step_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'execution_id' => 'Execution ID',
            'job_step_id' => 'Job Step ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'duration' => 'Duration',
            'success' => 'Success',
            'response_message' => 'Response Message',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecution()
    {
        return $this->hasOne(PjeExecution::className(), ['id' => 'execution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobStep()
    {
        return $this->hasOne(PjeJobStep::className(), ['id' => 'job_step_id']);
    }
}
