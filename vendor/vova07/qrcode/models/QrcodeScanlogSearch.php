<?php

namespace vendor\vova07\qrcode\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\vova07\qrcode\models\QrcodeScanlog;

/**
 * QrcodeScanlogSearch represents the model behind the search form about `vendor\vova07\qrcode\models\QrcodeScanlog`.
 */
class QrcodeScanlogSearch extends QrcodeScanlog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qrcode_id', 'terminal_type', 'scan_at'], 'integer'],
            [['scan_ip'], 'safe'],
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
        $query = QrcodeScanlog::find();

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
            'qrcode_id' => $this->qrcode_id,
            'terminal_type' => $this->terminal_type,
            'scan_at' => $this->scan_at,
        ]);

        $query->andFilterWhere(['like', 'scan_ip', $this->scan_ip]);

        return $dataProvider;
    }
}
