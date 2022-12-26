<?php

declare(strict_types=1);

namespace app\filters;

use app\models\search\HistorySearch;
use Yii;
use yii\base\ActionFilter;

class HistorySearchFilter extends ActionFilter implements ValidationFilterInterface
{
    /**
     * @var HistorySearch
     */
    private $model;

    public function beforeAction($action)
    {
        $this->model = new HistorySearch();
        $this->model->load(Yii::$app->request->queryParams);
        $this->validate();

        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        return parent::afterAction($action, $result);
    }

    /**
     * @return HistorySearch
     */
    public function getModel(): HistorySearch
    {
        return $this->model;
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }
}