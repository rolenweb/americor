<?php
/**
 * Dependency Injection Container configuration
 */

return [
    'definitions' => [
        'app\services\HistoryDataProviderService',
        'app\services\ExportService',
        'app\repositories\HistoryDataProviderRepositoryInterface' => 'app\repositories\HistoryDataProviderRepository'
    ]
];