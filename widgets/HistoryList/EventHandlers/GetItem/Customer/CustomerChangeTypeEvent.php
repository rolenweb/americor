<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem\Customer;

use app\models\Customer;
use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface;
use app\widgets\HistoryList\EventHandlers\GetItem\Item;

class CustomerChangeTypeEvent implements GetItemInterface
{

    public function get(History $history): Item
    {
        return new Item(
            '_item_statuses_change',
            [
                'model' => $history,
                'oldValue' => Customer::getTypeTextByType($history->getDetailOldValue('type')),
                'newValue' => Customer::getTypeTextByType($history->getDetailNewValue('type'))
            ]
        );
    }
}