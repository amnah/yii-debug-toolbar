<?php

class KToolbar extends YiiDebugToolbar
{
    /**
     * Run.
     */
    public function run()
    {
        $this->render('k_yii_debug_toolbar', array(
            'panels' => $this->getPanels()
        ));
    }
}