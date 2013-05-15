<?php

require_once dirname(__FILE__) . '/YiiDebugToolbarRoute.php';
class KToolbarRoute extends YiiDebugToolbarRoute
{
    protected  $panels = array(
        'KToolbarPanelLogging',
        'KToolbarPanelSql',
        'KToolbarPanelRequest',
        'KToolbarPanelViewsRendering',
        'KToolbarPanelAjax',
    );

    protected $_toolbarWidget;
    protected function getToolbarWidget()
    {
        if (null === $this->_toolbarWidget)
        {
            $this->_toolbarWidget = Yii::createComponent(array(
                'class'=>'KToolbar',
                'panels'=> $this->panels,
            ), $this);

            // change css file
            $this->_toolbarWidget->cssFile = $this->_toolbarWidget->getAssetsUrl() . '/k.yii.debugtoolbar.css';
        }
        return $this->_toolbarWidget;
    }
}
