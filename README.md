[![Latest Version on Packagist](http://img.shields.io/packagist/v/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)
[![Installations via composer per month](http://img.shields.io/packagist/dm/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)
[![Installations via composer total](http://img.shields.io/packagist/dt/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)

# contao-textwizard
Contao backend widget for text list input

contao-textwizard is a backend widget that can be used to add or edit a variable list of text input fields unlike the Contao listWizard widget. Additionally to the listWizard functionality contao-textwizard selects the content of a newly created or duplicated text field and it adds a button to create an empty new text field.

<img width="944" height="264" alt="textwizard" src="https://github.com/user-attachments/assets/4ffac05f-841e-439a-8c70-3c9661cf3e2a" />

## Requirements

- PHP 8.3 or later
- Contao 5.7 LTS (`^5.7`)

## Use in the data container array (DCA)

```php
'matrixrows' => array
(
  'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['matrixrows'],
  'exclude'                 => true,
  'inputType'               => 'textwizard',
  'eval'                    => array(
    'allowHtml'             => true,
    'decodeEntities'        => true,
    'buttonTitles'          => array(
      'new'                 => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_new'],
      'copy'                => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_copy'],
      'delete'              => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_delete']
    )
  ),
  'sql'                     => "blob NULL"
),
```

## Release history

### Contao 5.7 support

* Added support for Contao 5.7 and PHP 8.3 or newer.
* Added drag-and-drop and keyboard sorting using the up/down arrow keys on the drag handle.
* Updated the new, copy and delete buttons to work with dynamically loaded widgets.
* Newly created or copied fields receive focus and their contents are selected.
* Prevented deletion of the final row.
* Preserved compatibility with existing DCA definitions and stored values, including custom `buttonTitles` and `maxlength` settings.
* Updated action icons to locally bundled SVGs.

## Updating existing installations

After updating the extension, clear the Contao cache and reinstall the bundle assets:

```sh
vendor/bin/contao-console cache:clear
vendor/bin/contao-console assets:install public
```

## Credits

Action icons are from [Lucide 0.468.0](https://github.com/lucide-icons/lucide/tree/0.468.0).
License notices are included in `src/Resources/public/icons/lucide/LICENSE`.
