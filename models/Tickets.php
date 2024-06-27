<?php

namespace app\models;

use Yii;
use app\models\Routes;
/**
 * This is the model class for table "tickets".
 *
 * @property int $id
 * @property int $number
 * @property int $user_id
 * @property int $route_id
 *
 * @property Routes $route
 * @property User $user
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'user_id', 'route_id'], 'required'],
            [['number', 'user_id', 'route_id'], 'integer'],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Routes::class, 'targetAttribute' => ['route_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'route_id' => 'Route ID',
        ];
    }

    /**
     * Gets query for [[Route]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Routes::class, ['id' => 'route_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function actionBook($route_id)
    {
        $route = Routes::findOne($route_id);
        if (!$route) {
            throw new NotFoundHttpException('Route not found');
        }

        $model = new Ticket();
        $model->route_id = $route_id;
        $model->user_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('book', [
            'model' => $model,
            'route' => $route,
        ]);
    }
}
