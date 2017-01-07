<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CitaMedica;

/**
 * SearchCitaMedica represents the model behind the search form about `app\models\CitaMedica`.
 */
class SearchCitaMedica extends CitaMedica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doctor', 'id_cita', 'presion_baja', 'temperatura', 'peso', 'frc_cardiaca', 'id_paciente', 'presion_alta'], 'integer'],
            [['revision_fisica', 'sintomas', 'diagnostico_exFisicos', 'diagnostico', 'fecha_cita', 'tratamiento_sm'], 'safe'],
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
        $query = CitaMedica::find();

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
            'id_doctor' => $this->id_doctor,
            'id_cita' => $this->id_cita,
            'presion_baja' => $this->presion_baja,
            'temperatura' => $this->temperatura,
            'peso' => $this->peso,
            'frc_cardiaca' => $this->frc_cardiaca,
            'id_paciente' => $this->id_paciente,
            'fecha_cita' => $this->fecha_cita,
            'presion_alta' => $this->presion_alta,
        ]);

        $query->andFilterWhere(['like', 'revision_fisica', $this->revision_fisica])
            ->andFilterWhere(['like', 'sintomas', $this->sintomas])
            ->andFilterWhere(['like', 'diagnostico_exFisicos', $this->diagnostico_exFisicos])
            ->andFilterWhere(['like', 'diagnostico', $this->diagnostico])
            ->andFilterWhere(['like', 'tratamiento_sm', $this->tratamiento_sm]);

        return $dataProvider;
    }
}
