<?php

/**
 * @copyright  Helmut Schottmüller 2008-2024
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Backend
 * @license    LGPL-3.0+, CC-BY-NC-3.0
 */

namespace Hschottm\TextWizardBundle;

use Contao\Widget;
use Contao\Cache;
use Contao\Image;
use Contao\StringUtil;

/**
 * Class TextWizard
 *
 * Provide a backend wizard to handle text lists
 *
 * @property integer $maxlength
 */
class TextWizard extends Widget
{
	/**
	 * Submit user input
	 * @var boolean
	 */
	protected $blnSubmitInput = true;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_widget';


	/**
	 * Add specific attributes
	 * @param string
	 * @param mixed
	 */
	public function __set($strKey, $varValue)
	{
		switch ($strKey)
		{
      case 'maxlength':
				if ($varValue > 0)
				{
					$this->arrAttributes['maxlength'] = $varValue;
				}
				break;

			case 'value':
				$this->varValue = StringUtil::deserialize($varValue);
				break;

			case 'mandatory':
				$this->arrConfiguration['mandatory'] = $varValue ? true : false;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}

  /**
	 * Generate the widget and return it as string
	 *
	 * @return string
	 */
	public function generate()
	{
		$arrButtons = array('new', 'copy', 'delete', 'drag');
		// Make sure there is at least an empty array
		if (empty($this->varValue) || !\is_array($this->varValue))
		{
			$this->varValue = array('');
		}
		// Initialize the tab index
		if (!Cache::has('tabindex'))
		{
			Cache::set('tabindex', 1);
		}

    $hasTitles = array_key_exists('buttonTitles', $this->arrConfiguration) && is_array($this->arrConfiguration['buttonTitles']);

    $return = ($this->wizard) ? '<div class="tl_wizard">' . $this->wizard . '</div>' : '';
		$return .= '<ul id="ctrl_'.$this->strId.'" class="tl_listwizard tl_textwizard">';
		// Add input fields
		for ($i=0, $c=\count($this->varValue); $i<$c; $i++)
		{
			$return .= '
    <li><input type="text" name="'.$this->strId.'[]" class="tl_text" value="'.StringUtil::specialchars($this->varValue[$i]).'"' . $this->getAttributes() . '> ';
			// Add buttons
			foreach ($arrButtons as $button)
			{
				if ($button == 'drag')
				{
					$return .= ' <button type="button" class="drag-handle" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['move']) . '" aria-hidden="true">' . Image::getHtml('drag.svg') . '</button>';
				}
				else
				{
          $buttontitle = ($hasTitles && array_key_exists($button, $this->arrConfiguration['buttonTitles'])) ? $this->arrConfiguration['buttonTitles'][$button] : $GLOBALS['TL_LANG']['MSC']['lw_'.$button];
					$return .= ' <button type="button" data-command="' . $button . '" title="' . StringUtil::specialchars($buttontitle) . '">' . Image::getHtml($button.'.svg') . '</button>';
				}
			}
			$return .= '</li>';
		}
		return $return.'
  </ul>
  <script>TextWizard.textWizard("ctrl_'.$this->strId.'")</script>';
	}
}

class_alias(TextWizard::class, 'TextWizard');
