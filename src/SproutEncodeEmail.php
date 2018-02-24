<?php

namespace barrelstrength\sproutencodeemail;

use Craft;
use craft\base\Plugin;
use barrelstrength\sproutencodeemail\web\twig\TwigExtensions;

class SproutEncodeEmail extends Plugin
{
    public function init()
    {
        parent::init();

        Craft::$app->view->twig->addExtension(new TwigExtensions());
    }
}
