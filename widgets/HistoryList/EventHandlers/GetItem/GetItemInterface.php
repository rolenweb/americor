<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem;

use app\models\History;

interface GetItemInterface
{
    public function get(History $history): Item;
}