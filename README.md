[![Latest Version on Packagist](http://img.shields.io/packagist/v/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)
[![Installations via composer per month](http://img.shields.io/packagist/dm/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)
[![Installations via composer total](http://img.shields.io/packagist/dt/hschottm/contao-textwizard.svg?style=flat)](https://packagist.org/packages/hschottm/contao-textwizard)

# contao-textwizard
Contao backend widget for text list input

contao-textwizard is a backend widget that can be used to add or edit a variable list of text input fields unlike the Contao listWizard widget. Additionally to the listWizard functionality contao-textwizard selects the content of a newly created or duplicated text field and it adds a button to create an empty new text field.

![textwizard](https://user-images.githubusercontent.com/873113/49338631-0781c200-f624-11e8-96a6-9567e19a178e.png)

## Requirements

- PHP 8.3 or later
- Contao 5.7 LTS (`^5.7`)

This version uses Contao's Stimulus sortable controller for drag-and-drop and
keyboard sorting (arrow up/down on the drag handle). The new, copy and delete
buttons work without MooTools, including widgets loaded via AJAX. Newly created
or copied fields receive focus and their contents are selected. The final row
cannot be deleted.

After updating the package, clear the Contao cache and reinstall the bundle assets
(e.g. `vendor/bin/contao-console cache:clear` and
`vendor/bin/contao-console assets:install public`). Existing DCA definitions and
serialized values remain compatible. Custom `buttonTitles` and `maxlength` are
still supported.

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

Action icons are bundled Lucide 0.468.0 SVGs (https://github.com/lucide-icons/lucide/tree/0.468.0). License notices are in `src/Resources/public/icons/lucide/LICENSE`. No CDN or JavaScript icon runtime is needed.
