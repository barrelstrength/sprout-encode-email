<?php
/**
 * Sprout Encode Email plugin for Craft CMS 3.x
 *
 * Protect email addresses in your templates from robots.
 *
 * @link      http://barrelstrengthdesign.com
 * @copyright Copyright (c) 2017 Barrel Strength Design
 */

namespace barrelstrength\sproutencodeemail;

use Craft;
use craft\base\Plugin;
use barrelstrength\sproutencodeemail\twigextensions\TwigExtensions;

/**
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    Barrel Strength Design
 * @package   SproutEncodeEmail
 * @since     3
 */
class SproutEncodeEmail extends Plugin
{
	/**
	 * Enable use of SproutEncodeEmail::$plugin-> in place of Craft::$app->
	 *
	 * @var \barrelstrength\sproutencodeemail\services\Api
	 */
	public static $api;

  public function init()
  {
    parent::init();

    self::$api = $this->get('api');

    Craft::$app->view->twig->addExtension(new TwigExtensions());
  }
}
