<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetBody\Sms;

use app\models\History;

class SmsEvent implements \app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface
{
    /**
     * @param History $history
     * @return string
     */
    public function get(History $history): string
    {
        return $history->sms->message ? $history->sms->message : '';
    }
}