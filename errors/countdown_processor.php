<?php

class Creatuity_Countdown_Processor extends Creatuity_Processor
{

    protected function _getIndexDir()
    {
        return __DIR__;
    }

    public function processCountdownData()
    {
        $this->_sendHeaders(200);
        header('Content-Type: application/javascript');
        $countdownData = $this->_calculateCountdownData();
        if($countdownData) {
            echo "var myCountdown = new Countdown({rangeHi: \"hour\" ,hideLine: true ,time: {$countdownData}
              ,labels:{font : \"Lato-Heavy\"}});";
        }
    }

    protected function _calculateCountdownData()
    {
        $serverTimeInGMT = getdate();
        $maintenanceFlagDate = $this->_getConfigFromFile();
        if ($maintenanceFlagDate) {
            $maintenanceOffTimeInGMT = strtotime($maintenanceFlagDate[0]);
            return $maintenanceOffTimeInGMT - $serverTimeInGMT[0];
        }

        return null;
    }

}
