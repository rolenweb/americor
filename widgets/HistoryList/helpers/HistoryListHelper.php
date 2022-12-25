<?php

namespace app\widgets\HistoryList\helpers;

use app\models\Call;
use app\models\Customer;
use app\models\History;
use app\widgets\HistoryList\EventHandlers\EventHandler;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyHandler;
use Yii;

class HistoryListHelper
{
    /**
     * @param History $model
     * @return string
     */
    public static function getBodyByModel(History $model): string
    {
        return EventHandler::getRenderBodyByModel($model->event)->get($model);
    }
}