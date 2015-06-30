<?php

class Creatuity_CustomMaintenance_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getLogoUrl($storeId = null)
    {
        return $this->getConfig('imagefield', $storeId);
    }

    public function getBackgroundColor($storeId = null)
    {
        return (string) $this->getConfig('background_color', $storeId);
    }

    public function getSideColor($storeId = null)
    {
        return (string) $this->getConfig('side_color', $storeId);
    }

    public function getFooterAndHeaderColor($storeId = null)
    {
        return (string) $this->getConfig('footer_header_color', $storeId);
    }

    public function getTitle($storeId = null)
    {
        return $this->getConfig('title', $storeId);
    }

    public function getTitleFontColor($storeId = null)
    {
        return (string) $this->getConfig('title_font_color', $storeId);
    }

    public function getNotification($storeId = null)
    {
        return $this->getConfig('notification', $storeId);
    }

    public function getNotificationFontColor($storeId = null)
    {
        return (string) $this->getConfig('notification_font_color', $storeId);
    }

    public function getCopyright($storeId = null)
    {
        return $this->getConfig('copyright', $storeId);
    }

    public function getCopyrightFontColor($storeId = null)
    {
        return (string) $this->getConfig('copyright_font_color', $storeId);
    }

    public function getEmailContactAddress($storeId = null)
    {
        return $this->getContactConfig('email_address', $storeId);
    }

    public function getPhoneNumber($storeId = null)
    {
        return $this->getContactConfig('phone_number', $storeId);
    }

    public function areTooltipsEnabled($storeId = null)
    {
        return (bool) $this->getConfig('enable_toolitps', $storeId);
    }

    public function getPhoneTooltip($storeId = null)
    {
        return $this->getConfig('phone_tooltip', $storeId);
    }

    public function isCounterAnimationEnabled($storeId = null)
    {
        return (bool) $this->getConfig('counter_animation', $storeId);
    }

    public function isTitleAnimationEnabled($storeId = null)
    {
        return (bool) $this->getConfig('title_animation', $storeId);
    }

    public function getEmailTooltip($storeId = null)
    {
        return $this->getConfig('email_tooltip', $storeId);
    }

    public function rotatatingIconsEnabled($storeId = null)
    {
        return $this->getSocialMediaConfig('rotating_icons', $storeId);
    }

    public function isFacebookEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_facebook', $storeId);
    }

    public function getFacebookPageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('facebook_page', $storeId);
    }

    public function isGoogleEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_google', $storeId);
    }

    public function getGooglePageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('google_page', $storeId);
    }

    public function isInstagramEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_instagram', $storeId);
    }

    public function getInstagramPageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('instagram_page', $storeId);
    }

    public function isPinterestEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_pinterest', $storeId);
    }

    public function getPinterestPageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('pinterest_page', $storeId);
    }

    public function isTwitterEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_twitter', $storeId);
    }

    public function getTwitterPageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('twitter_page', $storeId);
    }

    public function isYoutubeEnabled($storeId = null)
    {
        return (bool) $this->getSocialMediaConfig('enable_youtube', $storeId);
    }

    public function getYoutubePageUrl($storeId = null)
    {
        return $this->getSocialMediaConfig('youtube_page', $storeId);
    }

    protected function getConfig($key, $storeId = null)
    {
        $path = 'creatuity_custommaintenance/general/' . $key;
        return Mage::getStoreConfig($path, $storeId);
    }

    protected function getContactConfig($key, $storeId = null)
    {
        $path = 'creatuity_custommaintenance/contact/' . $key;
        return Mage::getStoreConfig($path, $storeId);
    }

    protected function getSocialMediaConfig($key, $storeId = null)
    {
        $path = 'creatuity_custommaintenance/social_media/' . $key;
        return Mage::getStoreConfig($path, $storeId);
    }

    public function getCustomGoogleTag($storeId = null)
    {
        return $this->getConfig('ga_tag', $storeId);
    }

}
