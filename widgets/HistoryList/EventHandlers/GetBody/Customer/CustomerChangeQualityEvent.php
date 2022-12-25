<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Customer;

use app\models\Customer;
use app\models\History;

class CustomerChangeQualityEvent extends CustomerEvent
{
    public function get(History $history): string
    {
        return "$history->eventText " .
            (Customer::getQualityTextByQuality($history->getDetailOldValue('quality')) ?? "not set") . ' to ' .
            (Customer::getQualityTextByQuality($history->getDetailNewValue('quality')) ?? "not set");
    }
}