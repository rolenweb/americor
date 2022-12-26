<?php

declare(strict_types=1);

namespace app\services;

use app\services\Dto\ExportLinkDto;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class ExportService
{
    /**
     * @param ExportLinkDto $dto
     * @return string
     */
    public function formExportLink(ExportLinkDto $dto): string
    {
        $params = ArrayHelper::merge([
            'exportType' => $dto->getType()
        ], $dto->getQueryParams());
        $params[0] = $dto->getAction();

        return Url::to($params);
    }

    /**
     * @param string $name
     * @return string
     */
    public function formExportFileName(string $name): string
    {
        return $name . '-' . time();
    }
}