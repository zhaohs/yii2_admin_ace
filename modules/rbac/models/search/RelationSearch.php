<?php

namespace app\modules\rbac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\rbac\models\Relation;

/**
 * RelationSearch represents the model behind the search form about `app\modules\rbac\models\Relation`.
 */
class RelationSearch extends Relation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'permission', 'rule', 'data', 'note'], 'safe'],
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
        $query = Relation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'permission', $this->permission])
            ->andFilterWhere(['like', 'rule', $this->rule])
            ->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
