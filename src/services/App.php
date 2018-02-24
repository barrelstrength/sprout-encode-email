<?php
/**
 * Sprout Encode Email plugin for Craft CMS 3.x
 *
 * Protect email addresses in your templates from robots.
 *
 * @link      http://barrelstrengthdesign.com
 * @copyright Copyright (c) 2017 Barrel Strength Design
 */

namespace barrelstrength\sproutencodeemail\services;

use craft\base\Component;

/**
 * App Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Barrel Strength Design
 * @package   SproutEncodeEmail
 * @since     3
 */
class App extends Component
{
    /**
     * @var Encode
     */
    public $encode;

    public function init()
    {
        $this->encode = new Encode();
    }
}
