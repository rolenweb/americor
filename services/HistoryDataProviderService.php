<?php

declare(strict_types=1);

namespace app\services;

use app\models\search\HistorySearch;
use app\repositories\HistoryDataProviderRepositoryInterface;
use yii\data\ActiveDataProvider;

class HistoryDataProviderService
{

    /**
     * @var HistoryDataProviderRepositoryInterface
     */
    private $historyDataProviderRepository;
    public function __construct(HistoryDataProviderRepositoryInterface $historyDataProviderRepository)
    {
        $this->historyDataProviderRepository = $historyDataProviderRepository;
    }

    public function findDateProviderByParams(HistorySearch $historySearch): ActiveDataProvider
    {
        return $this->historyDataProviderRepository->findByParams($historySearch);
    }
}