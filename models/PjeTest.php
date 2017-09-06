<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_test".
 *
 * @property integer $id
 * @property string $test_class
 * @property integer $is_active
 *
 * @property PjeExecutionTest[] $pjeExecutionTests
 */
class PjeTest extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['test_class'], 'required'],
            [['is_active'], 'integer'],
            [['test_class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'test_class' => 'Test Class',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjeExecutionTests()
    {
        return $this->hasMany(PjeExecutionTest::className(), ['test_id' => 'id']);
    }
}
