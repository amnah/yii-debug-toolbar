<?php

class KToolbarPanelAjax extends YiiDebugToolbarPanel
{
    /**
     * {@inheritdoc}
     */
    public function getMenuTitle()
    {
        return "<span id='num_ajax'>0</span> " . YiiDebug::t('ajax');
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return YiiDebug::t('Request');
    }

    /**
     * {@inheritdoc}
     */
    public function init()
    {}

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->render('kajax');
    }
}
