<?php

class Creatuity_CustomMaintenance_Adminhtml_RebuildController extends Mage_Adminhtml_Controller_Action
{

    public function rebuildAction()
    {
        try {
            $model = Mage::getModel('creatuity_custommaintenance/maintenance_maintenance');
            $model->rebuild();
        } catch (Exception $e) {
            $this->_processError("Uknwown problem with rebuilding maintenance views", $e);
        } catch (MaintenanceException $e) {
            $this->_processError($e->getMessage(), $e);
        }
    }

    protected function _processError($message, Exception $e)
    {
        Mage::log($e);
        Mage::getSingleton('adminhtml/session')->addSuccess($message);
    }

}
