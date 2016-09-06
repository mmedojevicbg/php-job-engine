<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_job_step".
 *
 * @property integer $id
 * @property integer $job_id
 * @property integer $step_id
 * @property string $title
 * @property integer $order_num
 * @property integer $stop_on_failure
 *
 * @property PjeExecutionStep[] $pjeExecutionSteps
 * @property PjeExecution[] $executions
 * @property PjeJob $job
 * @property PjeStep $step
 */
class PjeJobStep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_job_step';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'step_id', 'title', 'order_num', 'stop_on_failure'], 'required'],
            [['job_id', 'step_id', 'order_num', 'stop_on_failure'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeJob::className(), 'targetAttribute' => ['job_id' => 'id']],
            [['step_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeStep::className(), 'targetAttribute' => ['step_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'step_id' => 'Step ID',
            'title' => 'Title',
            'order_num' => 'Order Num',
            'stop_on_failure' => 'Stop On Failure',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjeExecutionSteps()
    {
        return $this->hasMany(PjeExecutionStep::className(), ['job_step_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExecutions()
    {
        return $this->hasMany(PjeExecution::className(), ['id' => 'execution_id'])->viaTable('pje_execution_step', ['job_step_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(PjeJob::className(), ['id' => 'job_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStep()
    {
        return $this->hasOne(PjeStep::className(), ['id' => 'step_id']);
    }
}
