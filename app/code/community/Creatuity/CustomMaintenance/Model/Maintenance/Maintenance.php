<?php

/**
 *
 * @category   Creatuity
 * @package    magento-theme
 * @copyright  Copyright (c) 2008-2014 Creatuity Corp. (http://www.creatuity.com)
 * @license    http://creatuity.com/license
 */
class MaintenanceException extends Exception {
    
}

class Creatuity_CustomMaintenance_Model_Maintenance_Maintenance {

    protected $templateFileName = 'maintenance_page.phtml';

    public function rebuild() {
        $this->_removeAllPageDirectories();
        $this->_generateMagentoStoresConfigFile();
        $this->_generateAllTemplates();
    }

    public function generateTemplate($store) {
        return $this->_generateTemplate($store);
    }

    public function rebuildSingleStore($storeCode) {
        $this->_savetoFile($storeCode, $this->_getWebsiteByStoreCode($storeCode),
        $this->templateFileName, $this->_generateTemplate(Mage::app()->getStore($storeCode)->getId()));
    }

    public function removeErrorPage($storeCode, $websiteCode) {
        $this->removePageDirectoryIfExists($storeCode, $websiteCode, false);
    }

    protected function _generateAllTemplates() {
        foreach ($this->_getStores() as $store) {
            $this->_savetoFile($store->getCode(), $store->getWebsite()->getCode(), $this->templateFileName,
            $this->_generateTemplate(Mage::app()->getStore($store->getCode())->getId()));
        }
    }

    protected function _removeAllPageDirectories() {
        $stores = $this->_getStores();
        foreach ($stores as $store) {
            $this->removePageDirectoryIfExists($store->getCode(), $store->getWebsite()->getCode());
        }
    }

    protected function _generateTemplate($storeId) {
        return Mage::app()
                        ->getLayout()
                        ->createBlock('creatuity_custommaintenance/maintenance_page')
                        ->setData('storeId', $storeId)
                        ->setArea('frontend')
                        ->toHtml();
    }

    protected function _generateMagentoStoresConfigFile() {
        $stores = array();

        $filePath = Mage::getBaseDir() . DS .
                'errors' . DS . 'creatuity_processor.data.php';

        foreach ($this->_getStores() as $store) {
            $stores[$store->getCode()] = $store->getWebsite()->getCode();
        }

        foreach (Mage::app()->getWebsites() as $website) {
            $stores[$website->getCode() . '-default'] = $website->getDefaultStore()->getCode();
            if ($website->getIsDefault()) {
                $stores['default-website'] = $website->getDefaultStore()->getCode();
            }
        }

        $this->_saveContentToFile($filePath, "<?php return " . var_export($stores, true) . ";");
    }

    public function removePageDirectoryIfExists($storeCode, $websiteCode) {
        $this->_removePageDirectory($storeCode, $websiteCode, false);
    }

    protected function _removePageDirectory($storeCode, $websiteCode, $mustExists = true) {
        $pageDirectory = $this->_getPageDirectory($storeCode, $websiteCode);

        $isExist = is_dir($pageDirectory) && file_exists($pageDirectory);

        if (!$mustExists && !$isExist) {
            return;
        }

        if (!$isExist) {
            throw new MaintenanceException("'{$pageDirectory}' is not a directory");
        }

        $this->_deleteTreeDirectory($pageDirectory);
    }

    protected function _deleteTreeDirectory($dir) {
        $files = array_diff(scandir($dir), array('.', '..'));

        foreach ($files as $file) {
            if (is_dir($dir . DS . $file) && !is_link($dir)) {
                delTree($dir . DS . $file);
            } else {
                unlink($dir . DS . $file);
            }
        }

        if (!rmdir($dir)) {
            throw new MaintenanceException("Cannot remove directory '{$dir}'");
        }
    }

    protected function _savetoFile($storeCode, $websiteCode, $fileName, $fileContent) {
        $this->_ensurePageDirectoryExists($storeCode, $websiteCode);

        $filePath = $this->_getPageFile($storeCode, $websiteCode, $fileName);

        $this->_saveContentToFile($filePath, $fileContent);
    }

    protected function _saveContentToFile($filePath, $content) {
        $fp = fopen($filePath, 'w+');

        if (!$fp) {
            throw new MaintenanceException("Cannot open file '{$filePath}' for write ");
        }

        try {
            if (fwrite($fp, $content) != strlen($content)) {
                throw new MaintenanceException("Cannot write to file '{$filePath}' ");
            }

            fclose($fp);
        } catch (Exception $e) {
            fclose($fp);
            throw $e;
        }
    }

    protected function _ensurePageDirectoryExists($storeCode, $websiteCode) {
        $pageDirectory = $this->_getPageDirectory($storeCode, $websiteCode);
        if (!is_dir($pageDirectory)) {
            mkdir($pageDirectory, 0777, true);
            if (!is_dir($pageDirectory)) {
                throw new MaintenanceException("'{$pageDirectory}' is not a directory");
            }
        }
    }

    protected function _getPageFile($storeCode, $websiteCode, $fileName) {
        return $this->_getPageDirectory($storeCode, $websiteCode) . DS . $fileName;
    }

    protected function _getPageDirectory($storeCode, $websiteCode) {
        return Mage::getBaseDir() . DS .
                'errors' . DS .
                'maintenance_' . $websiteCode . '_' . $storeCode;
    }

    protected function _getStores() {
        return Mage::app()->getStores();
    }

    protected function _getWebsiteByStoreCode($storeCode) {
        return Mage::app()->getStore($storeCode)->getWebsite()->getCode();
    }

}
