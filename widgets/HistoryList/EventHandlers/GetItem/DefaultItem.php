<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem;

use app\models\History;
use app\widgets\HistoryList\helpers\HistoryListHelper;

class DefaultItem implements GetItemInterface
{
    public function get(History $history): Item
    {
        return new Item(
            '_item_common',
            [
                'user' => $history->user,
                'body' => HistoryListHelper::getBodyByModel($history),
                'bodyDatetime' => $history->ins_ts,
                'iconClass' => 'fa-gear bg-purple-light'
            ]
        );
    }
}