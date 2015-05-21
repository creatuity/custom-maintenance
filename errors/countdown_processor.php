<?php

class Creatuity_Countdown_Processor extends Creatuity_Processor {

    
    protected function _getIndexDir() {
        return __DIR__;
    }
    
    public function processCountdownData() {
        $this->_sendHeaders(200);
        header('Content-Type: application/javascript');
        echo "var myCountdown = new Countdown({rangeHi: \"hour\" ,hideLine: true ,time: {$this->_calculateCountdownData()}
              ,labels:{font : \"Lato-Heavy\"}});";
    }
    
    protected function _calculateCountdownData() {
        $serverTimeInGMT = getdate();
        $maintenanceFlagDate = $this->_getConfigFromFile();
        $maintenanceOffTimeInGMT = strtotime($maintenanceFlagDate[0]);
        return $maintenanceOffTimeInGMT - $serverTimeInGMT[0];
    }

    

}
