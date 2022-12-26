<?php
use app\models\History;
use app\widgets\HistoryList\EventHandlers\EventHandler;

/** @var $model History */

$item = EventHandler::getItem($model->event)->get($model);

echo $this->render($item->getName(), $item->getData());

