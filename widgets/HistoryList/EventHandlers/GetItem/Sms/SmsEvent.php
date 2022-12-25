<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem\Sms;

use app\models\History;
use app\models\Sms;
use app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface;
use app\widgets\HistoryList\EventHandlers\GetItem\Item;
use app\widgets\HistoryList\helpers\HistoryListHelper;
use Yii;

class SmsEvent implements GetItemInterface
{

    public function get(History $history): Item
    {
        return new Item(
            '_item_common',
            [
                'user' => $history->user,
                'body' => HistoryListHelper::getBodyByModel($history),
                'footer' => $history->sms->direction == Sms::DIRECTION_INCOMING ?
                    Yii::t('app', 'Incoming message from {number}', [
                        'number' => $history->sms->phone_from ?? ''
                    ]) : Yii::t('app', 'Sent message to {number}', [
                        'number' => $history->sms->phone_to ?? ''
                    ]),
                'iconIncome' => $history->sms->direction == Sms::DIRECTION_INCOMING,
                'footerDatetime' => $history->ins_ts,
                'iconClass' => 'icon-sms bg-dark-blue'
            ]
        );
    }
}