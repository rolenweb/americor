<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Task;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface;

class TaskEvent implements GetBodyInterface
{
    /**
     * @param History $history
     * @return string
     */
    public function get(History $history): string
    {
        $task = $history->task;

        return "$history->eventText: " . ($task->title ?? '');
    }
}