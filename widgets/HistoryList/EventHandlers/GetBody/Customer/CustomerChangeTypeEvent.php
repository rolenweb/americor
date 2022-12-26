<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Customer;

use app\models\Customer;
use app\models\History;

class CustomerChangeTypeEvent extends CustomerEvent
{
    public function get(History $history): string
    {
        return "$history->eventText " .
            (Customer::getTypeTextByType($history->getDetailOldValue('type')) ?? "not set") . ' to ' .
            (Customer::getTypeTextByType($history->getDetailNewValue('type')) ?? "not set");
    }
}