<?php

namespace vendor\vova07\qrcode\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\vova07\qrcode\models\QrcodeBatch;

/**
 * QrcodeBatchSearch represents the model behind the search form about `vendor\vova07\qrcode\models\QrcodeBatch`.
 */
class QrcodeBatchSearch extends QrcodeBatch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'formats_id', 'start_time', 'end_time', 'status_id', 'deleted', 'author_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'base_url', 'redirect_url', 'memo'], 'safe'],
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
        $query = QrcodeBatch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'formats_id' => $this->formats_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'status_id' => $this->status_id,
            'deleted' => $this->deleted,
            'author_id' => $this->author_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'base_url', $this->base_url])
            ->andFilterWhere(['like', 'redirect_url', $this->redirect_url])
            ->andFilterWhere(['like', 'memo', $this->memo]);

        return $dataProvider;
    }
}
