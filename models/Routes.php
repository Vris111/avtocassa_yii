<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "routes".
 *
 * @property int $id
 * @property int $number
 * @property string $from_where
 * @property string $to_where
 * @property string $driver
 * @property int $bus_type
 * @property string $departure_date
 * @property string $departure_time
 * @property int $slots
 *
 * @property BusTypes $busType
 * @property Tickets[] $tickets
 */
class Routes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'routes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'from_where', 'to_where', 'driver', 'bus_type', 'departure_date', 'departure_time', 'slots', 'price'], 'required'],
            [['number', 'bus_type', 'slots', 'price'], 'integer'],
            [['departure_date', 'departure_time'], 'safe'],
            [['from_where', 'to_where', 'driver'], 'string', 'max' => 255],
            [['bus_type'], 'exist', 'skipOnError' => true, 'targetClass' => BusTypes::class, 'targetAttribute' => ['bus_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'from_where' => 'From Where',
            'to_where' => 'To Where',
            'driver' => 'Driver',
            'bus_type' => 'Bus Type',
            'departure_date' => 'Departure Date',
            'departure_time' => 'Departure Time',
            'slots' => 'Slots',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[BusType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusType()
    {
        return $this->hasOne(BusTypes::class, ['id' => 'bus_type']);
    }

    /**
     * Gets query for [[Tickets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Tickets::class, ['route_id' => 'id']);
    }

    public function search($params)
    {
        $query = self::find();

        if (!empty($params['from_where'])) {
            $query->andFilterWhere(['like', 'from_where', $params['from_where']]);
        }

        if (!empty($params['to_where'])) {
            $query->andFilterWhere(['like', 'to_where', $params['to_where']]);
        }

        if (!empty($params['departure_date'])) {
            $query->andFilterWhere(['=', 'departure_date', $params['departure_date']]);
        }

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }

}
