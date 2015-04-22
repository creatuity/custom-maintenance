<?php

/**
 *
 * @category   Creatuity
 * @package    magento-theme
 * @copyright  Copyright (c) 2008-2014 Creatuity Corp. (http://www.creatuity.com)
 * @license    http://creatuity.com/license/
 */
class Creatuity_CustomMaintenance_Adminhtml_PreviewController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $block = $this->getLayout()
                ->createBlock('creatuity_custommaintenance/maintenance_page')
                ->setData('storeId', $this->getRequest()->getParam('storeId'))->setArea('frontend');
        $this->getResponse()->setBody($block->toHtml());
    }

}

