<?php

namespace barrelstrength\sproutencodeemail;

use barrelstrength\sproutencodeemail\services\App;
use Craft;
use craft\base\Plugin;
use barrelstrength\sproutencodeemail\web\twig\TwigExtensions;
use yii\base\InvalidConfigException;

class SproutEncodeEmail extends Plugin
{
    /**
     * Enable use of SproutEncodeEmail::$app-> in place of Craft::$app->
     *
     * @var App
     */
    public static $app;

    /**
     * @var string
     */
    public $schemaVersion = '2.0.0';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        $this->setComponents([
            'app' => App::class
        ]);

        self::$app = $this->get('app');

        Craft::$app->view->registerTwigExtension(new TwigExtensions());
    }
}
