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

    public static function getLongest($dateFrom, $number) {
        $sql = 'select pjs.id, max(pjs.title) as title, max(pj.title) as job_title, avg(duration) as avg_duration from pje_execution_step pes
                inner join pje_job_step pjs on pes.job_step_id = pjs.id
                inner join pje_job pj on pjs.job_id = pj.id
                where end_time >= :date_from
                group by pjs.id
                order by avg(duration) desc;';
        $params = [];
        $params[':date_from'] = $dateFrom;
        $data = Yii::$app->getDb()->createCommand($sql, $params)->queryAll();
        foreach($data as &$row) {
            $row['title'] = $row['title'] . ' (' . $row['job_title'] . ')';
        }
        return array_slice($data, 0, $number);
    }
    
    public static function normalizeOrderNum($jobId) {
        $stepsForJob = PjeJobStep::find()->where(['job_id' => $jobId])->orderBy('order_num, id')->all();
        $orderNum = 0;
        foreach($stepsForJob as $step) {
            $step->order_num = ++$orderNum;
            $step->save(false);
        }
    }
}
