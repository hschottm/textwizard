<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * @copyright  Helmut Schottmüller 2008
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    Backend
 * @license    LGPL
 */


/**
 * Class TextWizard
 *
 * Provide methods to handle text lists
 * @copyright  Helmut Schottmüller 2008
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    Controller
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
			case 'value':
				$this->varValue = deserialize($varValue);
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
	 * @return string
	 */
	public function generate()
	{
		if (is_array($GLOBALS['TL_JAVASCRIPT']))
		{
			array_insert($GLOBALS['TL_JAVASCRIPT'], 1, 'system/modules/textwizard/assets/textwizard.js');
		}
		else
		{
			$GLOBALS['TL_JAVASCRIPT'] = array('system/modules/textwizard/assets/textwizard.js');
		}

		$arrButtons = array('new','copy', 'up', 'down', 'delete');

		$strCommand = 'cmd_' . $this->strField;
		// Change the order
		if (\Input::get($strCommand) && is_numeric(\Input::get('cid')) && \Input::get('id') == $this->currentRecord)
		{
			$this->import('Database');
			switch (\Input::get($strCommand))
			{
				case 'new':
					array_insert($this->varValue, \Input::get('cid') + 1, "");
					break;

				case 'copy':
					$this->varValue = array_duplicate($this->varValue, \Input::get('cid'));
					break;

				case 'up':
					$this->varValue = array_move_up($this->varValue, \Input::get('cid'));
					break;

				case 'down':
					$this->varValue = array_move_down($this->varValue, \Input::get('cid'));
					break;

				case 'delete':
					$this->varValue = array_delete($this->varValue, \Input::get('cid'));
					break;
			}

			$this->Database->prepare("UPDATE " . $this->strTable . " SET " . $this->strField . "=? WHERE id=?")
						   ->execute(serialize($this->varValue), $this->currentRecord);

			$this->redirect(preg_replace('/&(amp;)?cid=[^&]*/i', '', preg_replace('/&(amp;)?' . preg_quote($strCommand, '/') . '=[^&]*/i', '', \Environment::get('request'))));
		}

		// Make sure there is at least an empty array
		if (!is_array($this->varValue) || count($this->varValue) == 0)
		{
			$this->varValue = array("");
		}

		$wizard = ($this->wizard) ? '<div class="tl_wizard">' . $this->wizard . '</div>' : '';
		// Add label
		$return .= '<div class="tl_multitextwizard">' . $wizard . '
	  <table cellspacing="0" cellpadding="0" class="tl_listwizard" id="ctrl_'.$this->strId.'" summary="Text wizard">';
//		$return .= '<ul id="ctrl_'.$this->strId.'" class="tl_listwizard">';
		$hasTitles = array_key_exists('buttonTitles', $this->arrConfiguration) && is_array($this->arrConfiguration['buttonTitles']);
		// Add input fields
		for ($i=0; $i<count($this->varValue); $i++)
		{
			$return .= '<tr><td style="padding-right: 5px;"><input type="text" name="'.$this->strId.'[]" class="tl_text" value="'.specialchars($this->varValue[$i]).'"' . $this->getAttributes() . ' /></td>';
			$return .= '<td style="white-space:nowrap;">';
			// Add buttons
			foreach ($arrButtons as $button)
			{
				$buttontitle = ($hasTitles && array_key_exists($button, $this->arrConfiguration['buttonTitles'])) ? $this->arrConfiguration['buttonTitles'][$button] : $GLOBALS['TL_LANG'][$this->strTable][$button][0];
				$return .= '<a href="'.$this->addToUrl('&amp;'.$strCommand.'='.$button.'&amp;cid='.$i.'&amp;id='.$this->currentRecord).'" title="'.specialchars($buttontitle).'" onclick="TextWizard.textWizard(this, \''.$button.'\', \'ctrl_'.$this->strId.'\'); return false;">'.$this->generateImage($button.'.gif', $buttontitle, 'class="tl_listwizard_img"').'</a> ';
			}
			$return .= '</td></tr>';
		}

		return $return.'
  </table></div>';
	}
}

?>