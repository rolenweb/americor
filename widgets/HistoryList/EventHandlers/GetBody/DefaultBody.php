<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody;

use app\models\History;

class DefaultBody implements GetBodyInterface
{

    public function get(History $history): string
    {
        return $history->eventText;
    }
}