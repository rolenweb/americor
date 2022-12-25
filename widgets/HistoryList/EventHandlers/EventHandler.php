<?php

declare(strict_types=1);

namespace app\widgets\HistoryList\EventHandlers;

use app\models\History;
use app\widgets\HistoryList\EventHandlers\GetBody\Call\IncomingCallEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Call\OutgoingCallEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Customer\CustomerChangeQualityEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Customer\CustomerChangeTypeEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\DefaultBody;
use app\widgets\HistoryList\EventHandlers\GetBody\Fax\IncomingFaxEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Fax\OutgoingFaxEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\GetBodyInterface;
use app\widgets\HistoryList\EventHandlers\GetBody\Sms\IncomingSmsEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Sms\OutgoingSmsEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Task\CompletedTaskEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Task\CreatedTaskEvent;
use app\widgets\HistoryList\EventHandlers\GetBody\Task\UpdatedTaskEvent;
use app\widgets\HistoryList\EventHandlers\GetItem\DefaultItem;
use app\widgets\HistoryList\EventHandlers\GetItem\GetItemInterface;
use Exception;
use yii\base\ErrorException;

class EventHandler
{
    /**
     * @param string $event
     * @return array|array[]
     */
    public static function get(string $event): array
    {
        return self::handlers()[$event];
    }

    /**
     * @param string $event
     * @return GetBodyInterface
     */
    public static function getRenderBodyByModel(string $event): GetBodyInterface
    {
        try {
            $handler = self::get($event)['view']['renderBodyByModel'];
        } catch (Exception $exception) {
            $handler = DefaultBody::class;
        }

        return new $handler;
    }

    /**
     * @param string $event
     * @return GetItemInterface
     */
    public static function getItem(string $event): GetItemInterface
    {
        try {
            $handler = self::get($event)['view']['renderItem'];
        } catch (Exception $exception) {
            $handler = DefaultItem::class;
        }

        return new $handler;
    }

    /**
     * @return array[]
     */
    private static function handlers(): array
    {
        return [
            History::EVENT_CREATED_TASK => [
                'view' => [
                    'renderBodyByModel' => CreatedTaskEvent::class,
                    'renderItem' => GetItem\Task\CreatedTaskEvent::class
                ]
            ],
            History::EVENT_UPDATED_TASK => [
                'view' => [
                    'renderBodyByModel' => UpdatedTaskEvent::class,
                    'renderItem' => GetItem\Task\UpdatedTaskEvent::class
                ]
            ],
            History::EVENT_COMPLETED_TASK => [
                'view' => [
                    'renderBodyByModel' => CompletedTaskEvent::class,
                    'renderItem' => GetItem\Task\CompletedTaskEvent::class
                ]
            ],
            History::EVENT_INCOMING_SMS => [
                'view' => [
                    'renderBodyByModel' => IncomingSmsEvent::class,
                    'renderItem' => GetItem\Sms\IncomingSmsEvent::class
                ]
            ],
            History::EVENT_OUTGOING_SMS => [
                'view' => [
                    'renderBodyByModel' => OutgoingSmsEvent::class,
                    'renderItem' => GetItem\Sms\OutgoingSmsEvent::class
                ]
            ],
            History::EVENT_INCOMING_FAX => [
                'view' => [
                    'renderBodyByModel' => IncomingFaxEvent::class,
                    'renderItem' => GetItem\Fax\IncomingFaxEvent::class
                ]
            ],
            History::EVENT_OUTGOING_FAX => [
                'view' => [
                    'renderBodyByModel' => OutgoingFaxEvent::class,
                    'renderItem' => GetItem\Fax\OutgoingFaxEvent::class
                ]
            ],
            History::EVENT_CUSTOMER_CHANGE_TYPE => [
                'view' => [
                    'renderBodyByModel' => CustomerChangeTypeEvent::class,
                    'renderItem' => GetItem\Customer\CustomerChangeQualityEvent::class
                ]
            ],
            History::EVENT_CUSTOMER_CHANGE_QUALITY => [
                'view' => [
                    'renderBodyByModel' => CustomerChangeQualityEvent::class,
                    'renderItem' => GetItem\Customer\CustomerChangeQualityEvent::class
                ]
            ],
            History::EVENT_INCOMING_CALL => [
                'view' => [
                    'renderBodyByModel' => IncomingCallEvent::class,
                    'renderItem' => GetItem\Call\IncomingCallEvent::class
                ]
            ],
            History::EVENT_OUTGOING_CALL => [
                'view' => [
                    'renderBodyByModel' => OutgoingCallEvent::class,
                    'renderItem' => GetItem\Call\OutgoingCallEvent::class
                ]
            ]
        ];
    }
}