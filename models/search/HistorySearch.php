<?php

namespace app\models\search;

use app\models\History;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HistorySearch represents the model behind the search form about `app\models\History`.
 *
 * @property array $objects
 */
class HistorySearch extends Model
{
    public $customer_id;
    public $user_id;
    public $event;
    public $object;
    public $object_id;
    public $message;

}
