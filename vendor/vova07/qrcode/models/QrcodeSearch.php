<?php

namespace vendor\vova07\qrcode\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\vova07\qrcode\models\Qrcode;

/**
 * QrcodeSearch represents the model behind the search form about `vendor\vova07\qrcode\models\Qrcode`.
 */
class QrcodeSearch extends Qrcode
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'formats_id', 'scans', 'status_id', 'deleted', 'author_id', 'batch_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'content', 'image_url', 'redirect_url', 'post_location', 'memo'], 'safe'],
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
        $query = Qrcode::find();

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
            'scans' => $this->scans,
            'status_id' => $this->status_id,
            'deleted' => $this->deleted,
            'author_id' => $this->author_id,
            'batch_id' => $this->batch_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image_url', $this->image_url])
            ->andFilterWhere(['like', 'redirect_url', $this->redirect_url])
            ->andFilterWhere(['like', 'post_location', $this->post_location])
            ->andFilterWhere(['like', 'memo', $this->memo]);

        return $dataProvider;
    }
}
