<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers\GetItem\Fax;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetItem\Item;
use app\widgets\HistoryList\helpers\HistoryListHelper;
use Yii;
use yii\helpers\Html;

class FaxEvent implements \app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface
{

    public function get(History $history): Item
    {
        $fax = $history->fax;

        return new Item(
            '_item_common',
            [
                'user' => $history->user,
                'body' => HistoryListHelper::getBodyByModel($history) .
                    ' - ' .
                    (isset($fax->document) ? Html::a(
                        Yii::t('app', 'view document'),
                        $fax->document->getViewUrl(),
                        [
                            'target' => '_blank',
                            'data-pjax' => 0
                        ]
                    ) : ''),
                'footer' => Yii::t('app', '{type} was sent to {group}', [
                    'type' => $fax ? $fax->getTypeText() : 'Fax',
                    'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
                ]),
                'footerDatetime' => $history->ins_ts,
                'iconClass' => 'fa-fax bg-green'
            ]
        );
    }
}