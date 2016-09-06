<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_job_step_param".
 *
 * @property integer $id
 * @property integer $job_step_id
 * @property string $param_name
 * @property string $param_value
 *
 * @property PjeJobStep $jobStep
 */
class PjeJobStepParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_job_step_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['param_name', 'param_value'], 'string', 'max' => 255],
            [['job_step_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeJobStep::className(), 'targetAttribute' => ['job_step_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_step_id' => 'Job Step ID',
            'param_name' => 'Param Name',
            'param_value' => 'Param Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJobStep()
    {
        return $this->hasOne(PjeJobStep::className(), ['id' => 'job_step_id']);
    }
}
