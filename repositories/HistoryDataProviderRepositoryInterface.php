<?php

declare(strict_types=1);

namespace app\repositories;

use app\models\search\HistorySearch;
use yii\data\ActiveDataProvider;

interface HistoryDataProviderRepositoryInterface
{
    public function findByParams(HistorySearch $params): ActiveDataProvider;
}