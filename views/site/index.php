<?php

use app\widgets\HistoryList\HistoryList;
use yii\data\ActiveDataProvider;

$this->title = 'Americor Test';

/**
 * @var ActiveDataProvider $dataProvider
 * @var string $linkExport
 */
?>

<div class="site-index">
    <?= HistoryList::widget(['dataProvider' => $dataProvider, 'linkExport' => $linkExport]) ?>
</div>
