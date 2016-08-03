<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property string $branch_id
 * @property string $branch_name
 * @property string $branch_email
 * @property string $branch_address
 * @property string $branch_created_date
 * @property string $companies_company_id
 *
 * @property Companies $companiesCompany
 * @property Departments[] $departments
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_created_date'], 'safe'],
            [['companies_company_id'], 'required'],
            [['companies_company_id'], 'integer'],
            [['branch_name', 'branch_email', 'branch_address'], 'string', 'max' => 45],
            [['companies_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['companies_company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             'companies_company_id' => 'Companies Name',
            'branch_id' => 'Branch ID',
            'branch_name' => 'Branch Name',
            'branch_email' => 'Branch Email',
            'branch_address' => 'Branch Address',
            'branch_created_date' => 'Branch Ccreated Date',
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'companies_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Departments::className(), ['branches_branch_id' => 'branch_id']);
    }
}
