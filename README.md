# contao-textwizard
Contao backend widget for text list input

contao-textwizard is a backend widget that can be used to add or edit a variable list of text input fields unlike the Contao listWizard widget. Additionally to the listWizard functionality contao-textwizard selects the content of a newly created or duplicated text field and it adds a button to create an empty new text field.

![textwizard](https://user-images.githubusercontent.com/873113/49338631-0781c200-f624-11e8-96a6-9567e19a178e.png)

## Use in the data container array (DCA)

```php
'matrixrows' => array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['matrixrows'],
	'exclude'                 => true,
	'inputType'               => 'textwizard',
	'eval'                    => array(
		'allowHtml'=>true,
		'decodeEntities' => true,
		'buttonTitles' => array(
			'new' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_new'],
			'copy' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_copy'],
			'delete' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_delete']
		)
	),
	'sql'                     => "blob NULL"
),
```
