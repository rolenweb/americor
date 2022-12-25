<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Call;

use app\models\Call;
use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface;

class CallEvent implements GetBodyInterface
{

    public function get(History $history): string
    {
        /** @var Call $call */
        $call = $history->call;
        return ($call ? $call->totalStatusText . ($call->getTotalDisposition(false) ? " <span class='text-grey'>" . $call->getTotalDisposition(false) . "</span>" : "") : '<i>Deleted</i> ');
    }
}