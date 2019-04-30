<?php

namespace barrelstrength\sproutencodeemail\services;

use craft\base\Component;
use Craft;

class Encode extends Component
{
    /**
     * @var int
     */
    private $count = 1;

    /**
     * Returns a rot13 encrypted string as well as a JavaScript decoder function.
     * http://snipplr.com/view/6037/
     *
     * @param string $string Value to be encoded
     *
     * @return mixed          An encoded string and javascript decoder function
     */
    public function encodeRot13($string)
    {
        $rot13encryptedString = str_replace('"', '\"', str_rot13($string));

        $uniqueId = uniqid('sproutencodeemail-', true);
        $countId = $this->count++;
        $ajaxId = Craft::$app->getRequest()->isAjax ? '-ajax' : '';

        $encodeId = $uniqueId.'-'.$countId.$ajaxId;

        $encodedString = '
<span id="'.$encodeId.'"></span>
<script type="text/javascript">
    var sproutencodeemailRot13String = "'.$rot13encryptedString.'";
    var sproutencodeemailRot13 = sproutencodeemailRot13String.replace(/[a-zA-Z]/g, function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});
    document.getElementById("'.$encodeId.'").innerHTML =
    sproutencodeemailRot13;
</script>';

        return $encodedString;
    }

    /**
     * Returns a string converted to html entities
     * http://goo.gl/LPhtJ
     *
     * @param string $string Value to be encoded
     *
     * @return mixed          Returns a string converted to html entities
     */
    public function encodeHtmlEntities($string)
    {
        $string = mb_convert_encoding($string, 'UTF-32', 'UTF-8');
        $t = unpack('N*', $string);
        $t = array_map(static function($n) {
            return "&#$n;";
        }, $t);

        return implode('', $t);
    }
}

