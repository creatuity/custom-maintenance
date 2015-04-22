<?php

/**
 *
 * @category   Creatuity
 * @package    magento-theme
 * @copyright  Copyright (c) 2008-2014 Creatuity Corp. (http://www.creatuity.com)
 * @license    http://creatuity.com/license
 */
class Creatuity_CustomMaintenance_Model_Maintenance_Observer {

    public function onConfigSave() {
        try {
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $model->rebuild();
        } catch (Exception $e) {
            $this->_processError("Uknwown problem with rebuilding maintenance views", $e);
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        }
    }

    public function removeStore($observer) {
        try {
            $store = $observer->getEvent()->getStore();
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $model->removeErrorPage($store->getCode(), $store->getWebsite()->getCode());
        } catch (Exception $e) {
            $this->_processError("Uknwown problem with rebuilding maintenance views", $e);
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        }
    }

    public function rebuildStore($observer) {
        try {
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $store = $observer->getEvent()->getStore();
            $model->removeErrorPage($store->getOrigData('code'),
                    Mage::app()->getWebsite($store->getOrigData('website_id'))->getCode());
            $model->rebuildSingleStore($store->getCode(), $store->getWebsite()->getCode());
        } catch (Exception $e) {
            $this->_processError("Uknwown problem with rebuilding maintenance views", $e);
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        }
    }

    protected function _processError($message, Exception $e) {
        Mage::log($e);
        Mage::getSingleton('adminhtml/session')->addSuccess($message);
    }

}
