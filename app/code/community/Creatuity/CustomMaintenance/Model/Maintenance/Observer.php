<?php

class Creatuity_CustomMaintenance_Model_Maintenance_Observer
{

    public function onConfigSave()
    {
        try {
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $model->rebuild();
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        } catch (Exception $e) {
            $this->_processError("Unknown problem with rebuilding maintenance views", $e);
        }
    }

    public function removeStore($observer)
    {
        try {
            $store = $observer->getEvent()->getStore();
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $model->removeErrorPage($store->getCode(), $store->getWebsite()->getCode());
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        } catch (Exception $e) {
            $this->_processError("Unknown problem with rebuilding maintenance views", $e);
        }
    }

    public function rebuildStore($observer)
    {
        try {
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $store = $observer->getEvent()->getStore();
            $model->removeErrorPage($store->getOrigData('code'), Mage::app()->getWebsite($store->getOrigData('website_id'))->getCode());
            $model->rebuildSingleStore($store->getCode(), $store->getWebsite()->getCode());
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        } catch (Exception $e) {
            $this->_processError("Unknown problem with rebuilding maintenance views", $e);
        }
    }

    protected function _processError($message, Exception $e)
    {
        Mage::log($e);
        Mage::getSingleton('adminhtml/session')->addError($message);
    }

}
