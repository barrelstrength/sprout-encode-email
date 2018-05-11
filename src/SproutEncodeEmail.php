<?php

namespace barrelstrength\sproutencodeemail;

use barrelstrength\sproutencodeemail\services\App;
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

    /**
     * @var string
     */
    public $schemaVersion = '2.0.0';

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();

        $this->setComponents([
            'app' => App::class
        ]);

        self::$app = $this->get('app');

        Craft::$app->view->twig->addExtension(new TwigExtensions());
    }
}
