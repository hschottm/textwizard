<?php

/**
 * @copyright  Helmut Schottmüller 2008-2024
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    Backend
 * @license    LGPL-3.0+, CC-BY-NC-3.0
 */

namespace Hschottm\TextWizardBundle;

use Contao\Widget;
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
        $stylesheet = 'bundles/hschottmtextwizard/css/textwizard.css';
        if (!in_array($stylesheet, $GLOBALS['TL_CSS'] ?? [], true)) {
            $GLOBALS['TL_CSS'][] = $stylesheet;
        }
		// Make sure there is at least an empty array
		if (empty($this->varValue) || !\is_array($this->varValue))
		{
			$this->varValue = array('');
		}

    $hasTitles = array_key_exists('buttonTitles', $this->arrConfiguration) && is_array($this->arrConfiguration['buttonTitles']);

    $return = ($this->wizard) ? '<div class="tl_wizard">' . $this->wizard . '</div>' : '';
		$return .= '<ul id="ctrl_'.StringUtil::specialchars($this->strId).'" class="tl_listwizard tl_textwizard" data-controller="contao--sortable" data-contao--sortable-handle-value=".drag-handle">';
		// Add input fields
		foreach ($this->varValue as $value)
		{
			$return .= '
    <li>';
					$return .= ' <input type="text" name="'.StringUtil::specialchars($this->strName).'[]" class="tl_text" value="'.StringUtil::specialchars($value).'"' . $this->getAttributes() . '>';
			// Add buttons
			foreach ($arrButtons as $button)
			{
                $icon = \Contao\Image::getHtml($button . '.svg', '', 'aria-hidden="true"');
				if ($button == 'drag')
				{
					$return .= ' <button type="button" class="drag-handle tl_textwizard_button" title="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['move']) . '" aria-label="' . StringUtil::specialchars($GLOBALS['TL_LANG']['MSC']['move']) . '" data-action="keydown->contao--sortable#move">' . $icon . '</button>';
				}
				else
				{
          $buttontitle = ($hasTitles && array_key_exists($button, $this->arrConfiguration['buttonTitles'])) ? $this->arrConfiguration['buttonTitles'][$button] : $GLOBALS['TL_LANG']['MSC']['lw_'.$button];
					$return .= ' <button type="button" class="tl_textwizard_button" data-command="' . $button . '" title="' . StringUtil::specialchars($buttontitle) . '" aria-label="' . StringUtil::specialchars($buttontitle) . '">' . $icon . '</button>';
				}
			}
			$return .= '</li>';
		}
		return $return.'
  </ul>';
	}
}

class_alias(TextWizard::class, 'TextWizard');
