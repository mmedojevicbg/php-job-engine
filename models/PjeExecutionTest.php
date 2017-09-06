<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_execution_test".
 *
 * @property integer $id
 * @property integer $test_id
 * @property string $test_time
 * @property string $response
 * @property integer $status
 *
 * @property PjeTest $test
 */
class PjeExecutionTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_execution_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_id', 'status'], 'required'],
            [['test_id', 'status'], 'integer'],
            [['test_time', 'test_id', 'status', 'response'], 'safe'],
            [['response'], 'string', 'max' => 255],
            [['test_id'], 'exist', 'skipOnError' => true, 'targetClass' => PjeTest::className(), 'targetAttribute' => ['test_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_id' => 'Test ID',
            'test_time' => 'Test Time',
            'response' => 'Response',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(PjeTest::className(), ['id' => 'test_id']);
    }
    
    public static function distinctDates() {
        $sql = 'select test_time from pje_execution_test group by test_time order by test_time desc;';
        return Yii::$app->getDb()->createCommand($sql)->queryColumn();
    }
    
    public static function testExecutionData($testTime) {
        $sql = 'select pt.test_class, pet.response, pet.status from pje_execution_test pet
                inner join pje_test pt on pet.test_id = pt.id
                where test_time = :time;';
        return Yii::$app->getDb()->createCommand($sql)->bindParam(':time', $testTime)->queryAll();
    }
}
