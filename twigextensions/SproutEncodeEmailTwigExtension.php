<?php
namespace Craft;

use Twig_Extension;
use Twig_Filter_Method;

class SproutEncodeEmailTwigExtension extends Twig_Extension
{
	private $count = 1;

	public function getName()
	{
		return 'Encode Email';
	}

	public function getFilters()
	{
		return array(
			'encode'   => new Twig_Filter_Method($this, 'encode', array('is_safe' => array('html'))),
			'rot13'    => new Twig_Filter_Method($this, 'rot13', array('is_safe' => array('html'))),
			'entities' => new Twig_Filter_Method($this, 'entities', array('is_safe' => array('html')))
		);
	}

	/**
	 * Encode string using Rot13.  This function does the same as the Rot13 function
	 * and only exists as it may be easier for some folks to remember 'encode'
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns Rot13 encoded string
	 */
	public function encode($string)
	{

		return $this->_encodeStringRot13($string);
	}

	/**
	 * Encode string using Rot13.
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns Rot13 encoded string
	 */
	public function rot13($string)
	{
		return $this->_encodeStringRot13($string);
	}

	/**
	 * Encode string using HTML Entities.
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns string encoded as HTML Entities
	 */
	public function entities($string)
	{
		return $this->_encodeHtmlEntities($string);
	}

	/**
	 * Returns a rot13 encrypted string as well as a JavaScript decoder function.
	 * http://snipplr.com/view/6037/
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          An encoded string and javascript decoder function
	 */
	private function _encodeStringRot13($string)
	{;
		$rot13encryptedString = str_replace('"', '\"', str_rot13($string));

		$uniqueId = uniqid();
		$countId  = $this->count++;
		$ajaxId   = (craft()->request->isAjaxRequest()) ? '-ajax' : '';

		$encodeId = 'sproutencodeemail-' . $uniqueId . '-' . $countId . $ajaxId;

		$encodedString = '
	<span id="' . $encodeId . '"></span>
	<script type="text/javascript">
		var sproutencodeemailRot13String = "' . $rot13encryptedString . '";
		var sproutencodeemailRot13 = sproutencodeemailRot13String.replace(/[a-zA-Z]/g, function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});
		document.getElementById("' . $encodeId . '").innerHTML =
		sproutencodeemailRot13;
      </script>';

		return $encodedString;
	}

	/**
	 * Returns a string converted to html entities
	 * http://goo.gl/LPhtJ
	 *
	 * @param  string $string Value to be encoded
	 * @return mixed          Returns a string converted to html entities
	 */
	private function _encodeHtmlEntities($string)
	{
		$string = mb_convert_encoding($string, 'UTF-32', 'UTF-8');
		$t      = unpack("N*", $string);
		$t      = array_map(function ($n)
		{
			return "&#$n;";
		}, $t);

		return implode("", $t);
	}
}