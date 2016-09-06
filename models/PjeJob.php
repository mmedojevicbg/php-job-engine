<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_job".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $job_class
 *
 * @property PjeJobStep[] $pjeJobSteps
 */
class PjeJob extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'job_class'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjeJobSteps()
    {
        return $this->hasMany(PjeJobStep::className(), ['job_id' => 'id']);
    }
    
    public static function jobClasses()
    {
        $stepsPath = Yii::$app->params['jobs_path'];
        $files = glob($stepsPath . DIRECTORY_SEPARATOR . '*Job.php');
        $jobClasses = [];
        $jobClasses[''] = '-- none --';
        foreach($files as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);
            $jobClasses[$fileName] = $fileName;
        }
        return $jobClasses;
    }
}
