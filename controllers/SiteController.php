<?php

namespace app\controllers;

use app\models\search\HistorySearch;
use app\services\Dto\ExportLinkDto;
use app\services\ExportService;
use app\services\HistoryDataProviderService;
use app\widgets\Export\Export;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @var HistoryDataProviderService
     */
    private $historyDataProviderService;

    /**
     * @var ExportService
     */
    private $exportService;

    /**
     * @param $id
     * @param $module
     * @param HistoryDataProviderService $historyDataProviderService
     * @param ExportService $exportService
     * @param $config
     */
    public function __construct(
        $id,
        $module,
        HistoryDataProviderService $historyDataProviderService,
        ExportService $exportService,
        $config = []
    ) {
        $this->historyDataProviderService = $historyDataProviderService;
        $this->exportService = $exportService;
        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'app\filters\HistorySearchFilter',
                'only' => ['index', 'export']
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'dataProvider' => $this->historyDataProviderService->findDateProviderByParams($this->model),
            'linkExport' => $this->exportService->formExportLink(
                new ExportLinkDto(
                    $this->request->getQueryParams(),
                    $this->id,
                    'export',
                    Export::FORMAT_CSV
                )
            )
        ]);
    }


    /**
     * @param string $exportType
     * @return string
     */
    public function actionExport($exportType)
    {
        return $this->render('export', [
            'dataProvider' => $this->historyDataProviderService->findDateProviderByParams($this->model),
            'exportType' => $exportType,
            'fileName' => $this->exportService->formExportFileName('history')
        ]);
    }
}
