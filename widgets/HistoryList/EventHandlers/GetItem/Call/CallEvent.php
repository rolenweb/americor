<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem\Call;

use app\models\Call;
use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface;
use app\widgets\HistoryList\EventHandlers\GetItem\Item;
use app\widgets\HistoryList\helpers\HistoryListHelper;

class CallEvent implements GetItemInterface
{

    public function get(History $history): Item
    {
        /** @var Call $call */
        $call = $history->call;
        $answered = $call && $call->status == Call::STATUS_ANSWERED;

        return new Item(
            '_item_common',
            [
                'user' => $history->user,
                'content' => $call->comment ?? '',
                'body' => HistoryListHelper::getBodyByModel($history),
                'footerDatetime' => $history->ins_ts,
                'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
                'iconClass' => $answered ? 'md-phone bg-green' : 'md-phone-missed bg-red',
                'iconIncome' => $answered && $call->direction == Call::DIRECTION_INCOMING
            ]
        );
    }
}