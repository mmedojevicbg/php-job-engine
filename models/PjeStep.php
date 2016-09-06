<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pje_step".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $step_class
 * @property integer $is_active
 *
 * @property PjeJobStep[] $pjeJobSteps
 */
class PjeStep extends \yii\db\ActiveRecord
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pje_step';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'step_class', 'is_active'], 'required'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['title', 'step_class'], 'string', 'max' => 255],
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
            'step_class' => 'Step Class',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPjeJobSteps()
    {
        return $this->hasMany(PjeJobStep::className(), ['step_id' => 'id']);
    }
}
