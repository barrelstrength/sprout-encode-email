<?php

namespace barrelstrength\sproutencodeemail\web\twig;

use barrelstrength\sproutencodeemail\SproutEncodeEmail;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TwigExtensions extends AbstractExtension
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Sprout Encode Email';
    }

    /**
     * Makes the filters available to the template context
     *
     * @return array
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('encode', [$this, 'getEncode'], ['is_safe' => ['html']]),
            new TwigFilter('rot13', [$this, 'getRot13'], ['is_safe' => ['html']]),
            new TwigFilter('entities', [$this, 'getEntities'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Encode string using Rot13.  This function does the same as the Rot13 function
     * and only exists as it may be easier for some folks to remember 'encode'
     *
     * @param string $string Value to be encoded
     *
     * @return mixed          Returns Rot13 encoded string
     */
    public function getEncode($string)
    {
        return SproutEncodeEmail::$app->encode->encodeRot13($string);
    }

    /**
     * Encode string using Rot13.
     *
     * @param string $string Value to be encoded
     *
     * @return mixed          Returns Rot13 encoded string
     */
    public function getRot13($string)
    {
        return SproutEncodeEmail::$app->encode->encodeRot13($string);
    }

    /**
     * Encode string using HTML Entities.
     *
     * @param string $string Value to be encoded
     *
     * @return mixed          Returns string encoded as HTML Entities
     */
    public function getEntities($string)
    {
        return SproutEncodeEmail::$app->encode->encodeHtmlEntities($string);
    }
}
