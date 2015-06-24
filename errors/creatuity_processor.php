<?php

class Creatuity_Processor extends Error_Processor
{

    protected $_storeCode;
    protected $_magentoConfig;

    public function process503()
    {
        $this->pageTitle = 'Error 503: Service Unavailable';
        $this->_sendHeaders(503);
        header('Retry-After: 86400');
        $this->_renderPage('maintenance_page.phtml');
    }

    protected function _prepareConfig()
    {
        $this->_magentoConfig = include $this->_errorDir . '/creatuity_processor.data.php';

        $design = $this->_loadXml(self::MAGE_ERRORS_DESIGN_XML);
        $this->_storeCode = $this->_determineStoreCode();
        $config = new stdClass();
        $config->skin = $this->_determineSkin($this->_storeCode);
        $this->_setSkin($this->_determineSkin($this->_storeCode));
        if (!is_null($design) && (string) $design->skin) {
            $this->_setSkin($this->_determineSkin($this->_storeCode), $config);
        }
        $this->_config = $config;
    }

    protected function _renderPage($template)
    {
        $baseTemplate = $this->_getTemplatePath($template);
        if ($baseTemplate) {
            require_once $baseTemplate;
        }
    }

    protected function _determineSkin($storeCode)
    {
        if ($storeCode === null) {
            return 'default';
        }
        return 'maintenance_' . $this->_magentoConfig[$storeCode] . '_' . $storeCode;
    }

    protected function _determineStoreCode()
    {
        if (!empty($GLOBALS['CREATUITY_MAINTENANCE_STORE'])) {
            return $GLOBALS['CREATUITY_MAINTENANCE_STORE'];
        }

        if (defined('CREATUITY_MAINTENANCE_STORE')) {
            return CREATUITY_MAINTENANCE_STORE;
        }

        if (!empty($_COOKIE['store'])) {
            return $_COOKIE['store'];
        }

        $mageRunType = isset($_SERVER['MAGE_RUN_TYPE']) ? $_SERVER['MAGE_RUN_TYPE'] : 'store';
        if ($mageRunType === 'store' && !empty($_SERVER['MAGE_RUN_CODE'])) {
            return $_SERVER['MAGE_RUN_CODE'];
        } elseif ($mageRunType === 'website' && !empty($_SERVER['MAGE_RUN_CODE'])) {
            return $this->_defaultStoreForWebsite($_SERVER['MAGE_RUN_CODE']);
        }
        return $this->_defaultStore();
    }

    protected function _defaultStoreForWebsite($websiteCode)
    {
        if (empty($this->_magentoConfig[$websiteCode . '-default'])) {
            return $this->_defaultStore();
        }
        return $this->_magentoConfig[$websiteCode . '-default'];
    }

    protected function _defaultStore()
    {
        if (empty($this->_magentoConfig['default-website'])) {
            return null;
        }
        return $this->_magentoConfig['default-website'];
    }

    protected function _getConfigFromFile()
    {
        $configFile = file($_SERVER['DOCUMENT_ROOT'] . '/maintenance.flag', FILE_IGNORE_NEW_LINES);
        return $configFile;
    }

}
