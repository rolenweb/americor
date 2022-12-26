<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody;

use app\models\History;

interface GetBodyInterface
{
    public function get(History $history): string;
}