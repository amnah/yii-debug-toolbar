<?php

class KToolbarPanelRequest extends YiiDebugToolbarPanelRequest
{
    /**
     * {@inheritdoc}
     */
    public function getMenuTitle()
    {
        return YiiDebug::t('request');
    }
}
