<?php

class KToolbarPanelSql extends YiiDebugToolbarPanelSql
{
    protected $_dbConnections;

    /**
     * {@inheritdoc}
     */
    public function getMenuTitle()
    {
        //return YiiDebug::t('SQL');
        if (false !== $this->_dbConnections)
        {
            $st = Yii::app()->db->getStats();

            // calculate whether to use seconds of milliseconds. use milliseconds if less than .1secs
            $time = $st[1] >= .1 ? $st[1] : $st[1]*1000;
            $time = round($time, 2);
            $timeSuffix = $st[1] >= .1 ? "s" : "ms";
            $queryTerm = $st[0] == 1 ? "query" : "queries";
            return "<span>{$st[0]}</span> $queryTerm / <span>{$time}</span>{$timeSuffix}";
        }
        return YiiDebug::t('No active connections');
    }

    /**
     * {@inheritdoc}
     */
    public function getMenuSubTitle($f=4)
    {
        return "";
    }
}
