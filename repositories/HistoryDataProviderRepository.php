<?php

declare(strict_types=1);

namespace app\repositories;

use app\models\History;
use app\models\search\HistorySearch;
use yii\data\ActiveDataProvider;

class HistoryDataProviderRepository implements HistoryDataProviderRepositoryInterface
{
    public function findByParams(HistorySearch $params): ActiveDataProvider
    {
        $query = History::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => [
                'ins_ts' => SORT_DESC,
                'id' => SORT_DESC
            ],
        ]);

        if (!$params->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }else {
            // here we can add conditions like $query->where($params->toArray())
        }

        $query->addSelect('history.*');
        $query->with([
            'customer',
            'user',
            'sms',
            'task',
            'call',
            'fax',
        ]);

        return $dataProvider;
    }
}