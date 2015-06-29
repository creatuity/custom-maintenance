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
        $logo = Mage::helper('creatuity_custommaintenance')
                ->getLogoUrl($this->_storeId);
        return $logo;
    }

    public function getBackgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance')
                ->getBackgroundColor($this->_storeId);

        return $color;
    }

    public function getSideBackgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance')
                ->getSideColor($this->_storeId);

        return $color;
    }

    public function getFooterAndHeaderBackgroundColor()
    {
        $color = Mage::helper('creatuity_custommaintenance')
                ->getFooterAndHeaderColor($this->_storeId);

        return $color;
    }

    public function getCopyright()
    {
        $copyright = Mage::helper('creatuity_custommaintenance')
                ->getCopyright($this->_storeId);

        if (!$copyright) {
            return null;
        }

        return $copyright;
    }

    public function getTitle()
    {
        $title = Mage::helper('creatuity_custommaintenance')
                ->getTitle($this->_storeId);

        if (!$title) {
            return null;
        }

        return $title;
    }

    public function getNotification()
    {
        $notification = Mage::helper('creatuity_custommaintenance')
                ->getNotification($this->_storeId);

        if (!$notification) {
            return null;
        }

        return $notification;
    }

    public function getEmailContactAddress()
    {
        $email = Mage::helper('creatuity_custommaintenance')
                ->getEmailContactAddress($this->_storeId);

        if (!$email) {
            return null;
        }

        return $email;
    }

    public function getPhoneNumber()
    {
        $phoneNumber = Mage::helper('creatuity_custommaintenance')
                ->getPhoneNumber($this->_storeId);

        if (!$phoneNumber) {
            return null;
        }

        return $phoneNumber;
    }

    public function areTooltipsEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->areTooltipsEnabled($this->_storeId);
    }

    public function getPhoneTooltip()
    {
        $tooltip = Mage::helper('creatuity_custommaintenance')
                ->getPhoneTooltip($this->_storeId);

        if (!$tooltip) {
            return null;
        }

        return $tooltip;
    }

    public function getEmailTooltip()
    {
        $tooltip = Mage::helper('creatuity_custommaintenance')
                ->getEmailTooltip($this->_storeId);

        if (!$tooltip) {
            return null;
        }

        return $tooltip;
    }

    public function isCounterAnimationEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isCounterAnimationEnabled($this->_storeId);
    }

    public function isTitleAnimationEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isTitleAnimationEnabled($this->_storeId);
    }

    public function rotatatingIconsEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->rotatatingIconsEnabled($this->_storeId);
    }

    public function isFacebookEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isFacebookEnabled($this->_storeId);
    }

    public function getFacebookPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getFacebookPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isGoogleEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isGoogleEnabled($this->_storeId);
    }

    public function getGooglePageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getGooglePageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isInstagramEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isInstagramEnabled($this->_storeId);
    }

    public function getInstagramPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getInstagramPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isPinterestEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isPinterestEnabled($this->_storeId);
    }

    public function getPinterestPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getPinterestPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isTwitterEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isTwitterEnabled($this->_storeId);
    }

    public function getTwitterPageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getTwitterPageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isYoutubeEnabled()
    {
        return Mage::helper('creatuity_custommaintenance')
                        ->isYoutubeEnabled($this->_storeId);
    }

    public function getYoutubePageUrl()
    {
        $url = Mage::helper('creatuity_custommaintenance')
                ->getYoutubePageUrl($this->_storeId);

        if (!$url) {
            return null;
        }

        return $url;
    }

    public function isGoogleAnalyticsAvailable()
    {
        return Mage::helper('googleanalytics')->isGoogleAnalyticsAvailable();
    }

    public function getGoogleAnalyticsAccountId()
    {
        return Mage::helper('googleanalytics')->getAccountId($this->_storeId);
    }

    public function getCustomGoogleTag()
    {
        return Mage::helper('creatuity_custommaintenance')->getCustomGoogleTag($this->_storeId);
    }

}
