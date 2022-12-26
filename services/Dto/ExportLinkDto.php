<?php

declare(strict_types=1);

namespace app\services\Dto;

class ExportLinkDto
{
    /**
     * @var array
     */
    private $queryParams;

    /**
     * @var string
     */
    private $controllerId;

    /**
     * @var string
     */
    private $actionId;

    /**
     * @var string
     */
    private $type;

    /**
     * @param array $queryParams
     * @param string $controllerId
     * @param string $actionId
     * @param string $type
     */
    public function __construct(array $queryParams, string $controllerId, string $actionId, string $type)
    {
        $this->queryParams = $queryParams;
        $this->controllerId = $controllerId;
        $this->actionId = $actionId;
        $this->type = $type;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getAction(): string
    {
        return $this->controllerId . '/' . $this->actionId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}