<?php

/**
 * [DESCRIPTION OF A FILE]
 *
 * @category   Creatuity
 * @package    magento-theme
 * @copyright  Copyright (c) 2008-2014 Creatuity Corp. (http://www.creatuity.com)
 * @license    http://creatuity.com/license/
 */
class Creatuity_CustomMaintenance_Block_Adminhtml_System_Config_Form_Preview_Button extends Mage_Adminhtml_Block_System_Config_Form_Field
{

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('creatuity/system/config/preview/button.phtml');
    }

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->_toHtml();
    }

    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
            'id' => 'preview_button',
            'label' => $this->helper('adminhtml')->__('Preview'),
            'onclick' => 'window.open(\'' . Mage::helper("adminhtml")->
            getUrl('custommaintenance/adminhtml_preview/index', array('storeId' => $this->getStoreId())) . '\')'
        ));

        return $button->toHtml();
    }

    public function getStoreId()
    {
        if (!Mage::app()->getRequest()->getParam('store')) {
            return null;
        }

        return Mage::getModel('core/store')->load(Mage::app()->getRequest()->getParam('store'))->getId();
    }

}
