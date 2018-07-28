<?php
namespace Craft;

class SproutEncodeEmailPlugin extends BasePlugin
{   
    public function getName()
    {
        return Craft::t('Sprout Encode Email');
    }

    public function getDescription()
    {
        return 'Protect email addresses in your templates from robots.';
    }

    public function getVersion()
    {
        return '1.3.0';
    }

    public function getDeveloper()
    {
        return 'Barrel Strength Design';
    }

    public function getDeveloperUrl()
    {
        return 'http://barrelstrengthdesign.com';
    }

    public function getDocumentationUrl()
    {
        return 'http://sprout.barrelstrengthdesign.com/craft-plugins/encode-email/docs';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/barrelstrength/craft-sprout-encode-email/v1/releases.json';
    }

    public function hasCpSection()
    {
        return false;
    }

    /**
     * Register twig extension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.sproutencodeemail.twigextensions.SproutEncodeEmailTwigExtension');
       
        return new SproutEncodeEmailTwigExtension();
    }
}
