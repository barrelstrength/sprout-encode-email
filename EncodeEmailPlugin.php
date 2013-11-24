<?php

namespace Craft;

class EncodeEmailPlugin extends BasePlugin
{   
    public function getName()
    {
        return Craft::t('Encode Email');
    }

    public function getVersion()
    {
        return '1.0';
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
        Craft::import('plugins.encodeemail.twigextensions.EncodeEmailTwigExtension');
       
        return new EncodeEmailTwigExtension();
    }
}
