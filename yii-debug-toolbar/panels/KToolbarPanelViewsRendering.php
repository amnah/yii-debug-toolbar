<?php

class KToolbarPanelViewsRendering extends YiiDebugToolbarPanelViewsRendering
{
     /**
     * {@inheritdoc}
     */
    public function getMenuTitle()
    {
        //return YiiDebug::t('Views Rendering');
        return YiiDebug::t('<span>{count}</span> views', array(
            '{count}'=>$this->viewsCount
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getMenuSubTitle()
    {
        return "";
    }
}