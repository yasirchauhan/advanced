<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property string $department_id
 * @property string $department_name
 * @property string $department_email
 * @property string $department_address
 * @property string $department_created_date
 * @property string $companies_company_id
 * @property string $branches_branch_id
 *
 * @property Branches $branchesBranch
 * @property Companies $companiesCompany
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companies_company_id', 'branches_branch_id'], 'required'],
            [['companies_company_id', 'branches_branch_id'], 'integer'],
            [['department_name', 'department_email', 'department_address', 'department_created_date'], 'string', 'max' => 45],
            [['branches_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branches_branch_id' => 'branch_id']],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department Name',
            'department_name' => 'Department Name',
            'department_email' => 'Department Email',
            'department_address' => 'Department Address',
            'department_created_date' => 'Department Created Date',
            'companies_company_id' => 'Companies Name',
            'branches_branch_id' => 'Branches Branch ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBranchesBranch()
    {
        return $this->hasOne(Branches::className(), ['branch_id' => 'branches_branch_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'companies_company_id']);
    }
}
