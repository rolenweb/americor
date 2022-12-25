<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Fax;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface;

class FaxEvent implements GetBodyInterface
{

    /**
     * @param History $history
     * @return string
     */
    public function get(History $history): string
    {
        return $history->eventText;
    }
}