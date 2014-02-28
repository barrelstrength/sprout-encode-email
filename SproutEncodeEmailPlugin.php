<?php

namespace Craft;

class SproutEncodeEmailPlugin extends BasePlugin
{   
    public function getName()
    {
        return Craft::t('Sprout Encode Email');
    }

    public function getVersion()
    {
        return '0.7.0';
    }

    public function getDeveloper()
    {
        return 'Barrel Strength Design';
    }

    public function getDeveloperUrl()
    {
        return 'http://barrelstrengthdesign.com';
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
