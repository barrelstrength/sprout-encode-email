<?php
namespace barrelstrength\sproutencodeemail;

use Craft;
use craft\base\Plugin;
use barrelstrength\sproutencodeemail\web\twig\TwigExtensions;

class SproutEncodeEmail extends Plugin
{
    /**
     * Enable use of SproutEncodeEmail::$app-> in place of Craft::$app->
     *
     * @var \barrelstrength\sproutencodeemail\services\App
     */
    public static $app;

    public function init()
    {
        parent::init();

        self::$app = $this->get('app');

        Craft::$app->view->twig->addExtension(new TwigExtensions());
    }
}
