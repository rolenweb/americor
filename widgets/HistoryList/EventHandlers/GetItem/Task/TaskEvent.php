<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem\Task;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface;
use app\widgets\HistoryList\EventHandlers\GetItem\Item;
use app\widgets\HistoryList\helpers\HistoryListHelper;

class TaskEvent implements GetItemInterface
{

    /**
     * @param History $history
     * @return Item
     */
    public function get(History $history): Item
    {
        return new Item(
            '_item_common',
            [
                'user' => $history->user,
                'body' => HistoryListHelper::getBodyByModel($history),
                'iconClass' => 'fa-check-square bg-yellow',
                'footerDatetime' => $history->ins_ts,
                'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
            ]
        );
    }
}