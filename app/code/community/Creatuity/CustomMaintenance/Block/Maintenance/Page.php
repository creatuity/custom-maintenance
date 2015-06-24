<?php

class Creatuity_CustomMaintenance_Block_Maintenance_Page extends Mage_Core_Block_Template
{

    protected $_storeId;

    public function _construct()
    {

        parent::_construct();
        $this->setTemplate('maintenance/maintenance_page.phtml');
    }

    protected function _beforeToHtml()
    {
        $this->_storeId = $this->getData('storeId');
    }

    public function getLogo()
    {
        $logo = Mage::helper('creatuity_custommaintenance/data')
                ->getLogoUrl($this->_storeId);
        return $logo;
    }

    public function getBakcgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance/data')
                ->getBakcgroundColor($this->_storeId);

        (string) $color;
    }

    public function getSideBackgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance/data')
                ->getSideColor($this->_storeId);

        return (string) $color;
    }

    public function getFooterAndHeaderBackgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance/data')
                ->getFooterAndHeaderColor($this->_storeId);

        return (string) $color;
    }

    public function getCopyright()
    {
        $copyright = Mage::helper('creatuity_custommaintenance/data')
                ->getCopyright($this->_storeId);

        if (!$copyright) {
            return null;
        }

        return $copyright;
    }

    public function getTitle()
    {
        $title = Mage::helper('creatuity_custommaintenance/data')
                ->getTitle($this->_storeId);

        if (!$title) {
            return null;
        }

        return $title;
    }

    public function getNotification()
    {
        $notification = Mage::helper('creatuity_custommaintenance/data')
                ->getNotification($this->_storeId);

        if (!$notification) {
            return null;
        }

        return $notification;
    }

    public function getEmailContactAddress()
    {
        $email = Mage::helper('creatuity_custommaintenance/data')
                ->getEmailContactAddress($this->_storeId);

        if (!$email) {
            return null;
        }

        return $email;
    }

    public function getPhoneNumber()
    {
        $phoneNumber = Mage::helper('creatuity_custommaintenance/data')
                ->getPhoneNumber($this->_storeId);

        if (!$phoneNumber) {
            return null;
        }

        return $phoneNumber;
    }

    public function areTooltipsEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->areTooltipsEnabled($this->_storeId);
    }

    public function getPhoneTooltip()
    {
        $tooltip = Mage::helper('creatuity_custommaintenance/data')
                ->getPhoneTooltip($this->_storeId);

        if (!$tooltip) {
            return null;
        }

        return $tooltip;
    }

    public function getEmailTooltip()
    {
        $tooltip = Mage::helper('creatuity_custommaintenance/data')
                ->getEmailTooltip($this->_storeId);

        if (!$tooltip) {
            return null;
        }

        return $tooltip;
    }

    public function isCounterAnimationEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isCounterAnimationEnabled($this->_storeId);
    }

    public function isTitleAnimationEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isTitleAnimationEnabled($this->_storeId);
    }

    public function RotatatingIconsEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->RotatatingIconsEnabled($this->_storeId);
    }

    public function isFacebookEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isFacebookEnabled($this->_storeId);
    }

    public function getfacebookPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getFacebookPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isGoogleEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isGoogleEnabled($this->_storeId);
    }

    public function getGooglePageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getGooglePageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isInstagramEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isInstagramEnabled($this->_storeId);
    }

    public function getInstagramPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getInstagramPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isPinterestEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isPinterestEnabled($this->_storeId);
    }

    public function getPinterestPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getPinterestPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isTwitterEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isTwitterEnabled($this->_storeId);
    }

    public function getTwitterPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getTwitterPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isYoutubeEnabled()
    {
        return Mage::helper('creatuity_custommaintenance/data')
                        ->isYoutubeEnabled($this->_storeId);
    }

    public function getYoutubePageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance/data')
                ->getYoutubePageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

}
