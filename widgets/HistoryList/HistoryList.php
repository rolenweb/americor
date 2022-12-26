<?php

namespace app\widgets\HistoryList;

use yii\base\Widget;
use yii\data\ActiveDataProvider;

class HistoryList extends Widget
{
    /**
     * @var ActiveDataProvider
     */
    public $dataProvider;

    /**
     * @var string
     */
    public $linkExport;

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('main', [
            'linkExport' => $this->linkExport,
            'dataProvider' => $this->dataProvider
        ]);
    }
}
