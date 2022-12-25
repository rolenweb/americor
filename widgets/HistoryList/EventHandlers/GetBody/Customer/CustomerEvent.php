<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Customer;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface;

class CustomerEvent implements GetBodyInterface
{

    public function get(History $history): string
    {
        return '';
    }
}