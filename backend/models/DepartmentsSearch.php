<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form about `backend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['department_id', 'companies_company_id', 'branches_branch_id'], 'integer'],
            [['department_name', 'department_email', 'department_address', 'department_created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Departments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'department_id' => $this->department_id,
            'companies_company_id' => $this->companies_company_id,
            'branches_branch_id' => $this->branches_branch_id,
        ]);

        $query->andFilterWhere(['like', 'department_name', $this->department_name])
            ->andFilterWhere(['like', 'department_email', $this->department_email])
            ->andFilterWhere(['like', 'department_address', $this->department_address])
            ->andFilterWhere(['like', 'department_created_date', $this->department_created_date]);

        return $dataProvider;
    }
}
