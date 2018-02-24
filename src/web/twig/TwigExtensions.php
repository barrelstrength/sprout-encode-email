<?php

namespace barrelstrength\sproutencodeemail\web\twig;

use barrelstrength\sproutencodeemail\SproutEncodeEmail;
use Craft;
use Twig_Extension;
use Twig_SimpleFunction;

class TwigExtensions extends Twig_Extension
{
    /**
     * @var int
     */
    private $count = 1;

    /**
     * @return string
     */
    public function getName()
    {
        return 'Sprout Encode Email';
    }

    /**
     * Makes the filters available to the template context
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('encode', [$this, 'encode'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('rot13', [$this, 'rot13'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('entities', [$this, 'entities'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Encode string using Rot13.  This function does the same as the Rot13 function
     * and only exists as it may be easier for some folks to remember 'encode'
     *
     * @param  string $string Value to be encoded
     *
     * @return mixed          Returns Rot13 encoded string
     */
    public function encode($string)
    {
        return SproutEncodeEmail::$app->utilities->encodeStringRot13($string);
    }

    /**
     * Encode string using Rot13.
     *
     * @param  string $string Value to be encoded
     *
     * @return mixed          Returns Rot13 encoded string
     */
    public function rot13($string)
    {
        return SproutEncodeEmail::$app->utilities->encodeStringRot13($string);
    }

    /**
     * Encode string using HTML Entities.
     *
     * @param  string $string Value to be encoded
     *
     * @return mixed          Returns string encoded as HTML Entities
     */
    public function entities($string)
    {
        return SproutEncodeEmail::$app->utilities->encodeHtmlEntities($string);
    }
}
