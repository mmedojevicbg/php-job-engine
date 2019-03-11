<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_execution".
 *
 * @property integer $id
 * @property string $start_time
 * @property string $end_time
 * @property integer $duration
 * @property integer $success
 *
 * @property PjeExecutionStep[] $pjeExecutionSteps
 * @property PjeJobStep[] $jobSteps
 */
class PjeExecution extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_execution';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['start_time', 'end_time', 'job_id'], 'safe'],
            [['duration', 'success', 'job_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'duration' => 'Duration',
            'success' => 'Success',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjeExecutionSteps()
    {
        return $this->hasMany(PjeExecutionStep::className(), ['execution_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobSteps()
    {
        return $this->hasMany(PjeJobStep::className(), ['id' => 'job_step_id'])->viaTable('pje_execution_step', ['execution_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(PjeJob::className(), ['id' => 'job_id']);
    }
    
    public static function getCompletedCount($date, $job)
    {
        return self::getFromDateQuery($date, $job)->count();
    }
    public static function getFailedCount($date, $job)
    {
        return self::getFromDateQuery($date, $job)
                            ->andWhere(['success' => 0])
                            ->count();
    }
    public static function getAvgDuration($date, $job)
    {
        return self::getFromDateQuery($date, $job)
                            ->average('TIMESTAMPDIFF(SECOND, start_time, end_time)');
    }
    public static function getMaxDuration($date, $job)
    {
        return self::getFromDateQuery($date, $job)
                            ->max('TIMESTAMPDIFF(SECOND, start_time, end_time)');
    }
    private static function getFromDateQuery($date, $job)
    {
        $query = PjeExecution::find()->where(['>=', 'start_time', $date]);
        if ($job) {
            $query->andWhere(['job_id' => $job]);
        }
        return $query;
    }
}
