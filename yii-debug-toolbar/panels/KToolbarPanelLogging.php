<?php

class KToolbarPanelLogging extends YiiDebugToolbarPanelLogging
{
    /**
     * {@inheritdoc}
     */
    public function getMenuTitle()
    {
        //return YiiDebug::t('Logging');
		$time = round(Yii::getLogger()->getExecutionTime(),2);
        $mem = round(Yii::getLogger()->getMemoryUsage()/1048576,1);

        return "<span>$time</span>s / <span>$mem</span>mb";
    }

    /**
     * {@inheritdoc}
     */
    public function getMenuSubTitle()
    {
        return "";
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $profileLogs = $this->getProfileLogs($this->logs);
        $this->render('klogging', array(
            'logs' => $this->logs,
            'profileLogs' => $this->processSummary($profileLogs),
        ));
    }

    /**
     * Gets profile logs (not db ones)
     * @return array
     */
    protected function getProfileLogs() {
        $logs = array();
        foreach ($this->owner->getLogs() as $entry)
        {
            if (CLogger::LEVEL_PROFILE === $entry[1] && false === strpos($entry[2], 'system.db.CDbCommand'))
            {
                $logs[] = $entry;
            }
        }
        return $logs;
    }

    /**
     * Processing summary.
     *
     * @param array $logs Logs.
     * @return array
     * @throws CException
     */
    protected function processSummary(array $logs)
    {
        if (empty($logs))
        {
            return $logs;
        }
        $stack = array();
        foreach($logs as $log)
        {
            $message = $log[0];
            if(0 === strncasecmp($message, 'begin:', 6))
            {
                $log[0]  =substr($message, 6);
                $stack[] =$log;
            }
            else if(0 === strncasecmp($message,'end:',4))
            {
                $token = substr($message,4);
                if(null !== ($last = array_pop($stack)) && $last[0] === $token)
                {
                    $delta = $log[3] - $last[3];

                    if(isset($results[$token]))
                        $results[$token] = $this->aggregateResult($results[$token], $delta);
                    else{
                        $results[$token] = array($token, 1, $delta, $delta, $delta);
                    }
                }
                else
                    throw new CException(Yii::t('yii-debug-toolbar',
                        'Mismatching code block "{token}". Make sure the calls to Yii::beginProfile() and Yii::endProfile() be properly nested.',
                        array('{token}' => $token)));
            }
        }

        $now = microtime(true);
        while(null !== ($last = array_pop($stack)))
        {
            $delta = $now - $last[3];
            $token = $last[0];

            if(isset($results[$token]))
                $results[$token] = $this->aggregateResult($results[$token], $delta);
            else{
                $results[$token] = array($token, 1, $delta, $delta, $delta);
            }
        }

        $entries = array_values($results);
        $func    = create_function('$a,$b','return $a[4]<$b[4]?1:0;');

        usort($entries, $func);

        return $entries;
    }

    /**
     * Aggregates the report result.
     * @param array $result log result for this code block
     * @param float $delta time spent for this code block
     * @return array
     */
    protected function aggregateResult($result,$delta)
    {
        list($token,$calls,$min,$max,$total)=$result;
        if($delta<$min)
            $min=$delta;
        else if($delta>$max)
            $max=$delta;
        $calls++;
        $total+=$delta;
        return array($token,$calls,$min,$max,$total);
    }
}
