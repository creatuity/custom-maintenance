<?php

class Creatuity_CustomMaintenance_Block_Adminhtml_System_Config_Form_Button extends Mage_Adminhtml_Block_System_Config_Form_Field
{

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('creatuity/system/config/button.phtml');
    }

    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {
        return $this->_toHtml();
    }

    public function getAjaxCheckUrl()
    {
        return Mage::helper('adminhtml')->getUrl('adminhtml/adminhtml_rebuild/rebuild');
    }

    public function getButtonHtml()
    {
        $button = $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
            'id' => 'rebuild_button',
            'label' => $this->helper('adminhtml')->__('Rebuild'),
            'onclick' => 'javascript:rebuild(); return false;',
        ));

        return $button->toHtml();
    }

}
