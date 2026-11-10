# Changelog

Changes are grouped by release line, newest version first within each line.
This file documents tags across the repository; it does not imply that every
version supports the Contao version of the branch containing this file.
Historical entries were reconstructed from tag diffs and the former README history.

## Contao 5.7 — 3.6.x

### [3.6.5] - 2026-11-10

- Moved release history out of the README into this repository-wide changelog, with dated entries and links for every release tag.
- Kept installation, update instructions and current compatibility requirements in the README. No runtime or dependency changes.

### [3.6.4] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation.
- Normalized the package license and source notices to LGPL-3.0-or-later.

### [3.6.3] - 2026-10-28

- Added twelve language catalogues (Czech, Spanish, Persian, French, Italian, Japanese, Dutch, Polish, Russian, Slovenian, Swedish and Turkish), bringing coverage to fourteen languages including English and German.

### [3.6.2] - 2026-10-28

- Updated README screenshots, feature documentation, compatibility requirements, update instructions and icon credits.

### [3.6.1] - 2026-10-28

- Refined widget action icon rendering, positioning and CSS layout.
- Restored button tooltip titles when creating or copying rows. Updated the README screenshot source.

### [3.6.0] - 2026-10-25

- Added support for Contao 5.7 and PHP 8.3 or newer.
- Integrated Contao drag-and-drop and keyboard sorting using the up/down arrow keys on the drag handle.
- Updated new, copy and delete actions to work with dynamically loaded widgets. Newly created or copied fields receive focus and their contents are selected.
- Prevented deletion of the final row and preserved existing DCA definitions and stored values, including custom buttonTitles and maxlength settings.
- Replaced action icons with locally bundled Lucide SVGs and updated service configuration.

## Contao 5.0+ — 3.5.x

### [3.5.8] - 2026-11-10

- Moved release history into this repository-wide changelog, with dated entries and links for every release tag.
- Linked the changelog from the README. No runtime or dependency changes.

### [3.5.7] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation.

### [3.5.6] - 2024-11-20

- Removed usage of the Cache class, which is no longer available in Contao 5.

### [3.5.5] - 2024-11-20

- Replaced the removed global deserialize() call with StringUtil::deserialize().

### [3.5.4] - 2024-11-20

- Corrected the Request import in widget registration to use Symfony HttpFoundation.

### [3.5.3] - 2024-11-20

- Added the missing ExtensionInterface import to the bundle class.

### [3.5.2] - 2024-11-20

- Corrected the return type of the bundle getContainerExtension() method.

### [3.5.1] - 2024-11-19

- Corrected the Contao Composer version constraint from ~5 to ^5.0.

### [3.5.0] - 2024-11-19

- Added Contao 5 support and raised the PHP requirement to 8.1.
- Updated widget registration and widget API usage for Contao 5; removed the obsolete minified JavaScript asset.

## Contao 4.13 — 3.4.x

### [3.4.2] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation.

### [3.4.1] - 2022-08-24

- Added the array return type to the Contao Manager plugin method.

### [3.4.0] - 2022-08-24

- Updated Composer requirements for Contao 4.13 and PHP 7.4 or PHP 8.

## Contao 4.4 — 3.2.x

### [3.2.2] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation.

### [3.2.1] - 2020-06-18

- Adjusted PHP constraints to ^5.6 || ^7.0, removed the explicit Symfony FrameworkBundle requirement and refreshed development dependencies.

### [3.2.0] - 2018-12-02

- Released the Contao 4.4 bundle with Composer autoloading and Contao Manager integration.
- Modernized widget markup and controls and documented DCA usage.

## Legacy Contao 3

### [Release/3.2.x-icon-1] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation. This is the asset-only update for the legacy Contao 3.2 line.

### [Release/3.2.x] - 2013-12-25

- Adapted widget location, autoloading and configuration for Contao 3.2.

### [legacy-contao-3.1-icon-1] - 2026-11-10

- Added the shared SVG package icon, README preview and Contao Manager logo documentation. This is the asset-only update for the legacy Contao 3.1 branch.

[3.6.5]: https://github.com/hschottm/textwizard/releases/tag/3.6.5
[3.6.4]: https://github.com/hschottm/textwizard/releases/tag/3.6.4
[3.6.3]: https://github.com/hschottm/textwizard/releases/tag/3.6.3
[3.6.2]: https://github.com/hschottm/textwizard/releases/tag/3.6.2
[3.6.1]: https://github.com/hschottm/textwizard/releases/tag/3.6.1
[3.6.0]: https://github.com/hschottm/textwizard/releases/tag/3.6.0
[3.5.8]: https://github.com/hschottm/textwizard/releases/tag/3.5.8
[3.5.7]: https://github.com/hschottm/textwizard/releases/tag/3.5.7
[3.5.6]: https://github.com/hschottm/textwizard/releases/tag/3.5.6
[3.5.5]: https://github.com/hschottm/textwizard/releases/tag/3.5.5
[3.5.4]: https://github.com/hschottm/textwizard/releases/tag/3.5.4
[3.5.3]: https://github.com/hschottm/textwizard/releases/tag/3.5.3
[3.5.2]: https://github.com/hschottm/textwizard/releases/tag/3.5.2
[3.5.1]: https://github.com/hschottm/textwizard/releases/tag/3.5.1
[3.5.0]: https://github.com/hschottm/textwizard/releases/tag/3.5.0
[3.4.2]: https://github.com/hschottm/textwizard/releases/tag/3.4.2
[3.4.1]: https://github.com/hschottm/textwizard/releases/tag/3.4.1
[3.4.0]: https://github.com/hschottm/textwizard/releases/tag/3.4.0
[3.2.2]: https://github.com/hschottm/textwizard/releases/tag/3.2.2
[3.2.1]: https://github.com/hschottm/textwizard/releases/tag/3.2.1
[3.2.0]: https://github.com/hschottm/textwizard/releases/tag/3.2.0
[Release/3.2.x-icon-1]: https://github.com/hschottm/textwizard/releases/tag/Release/3.2.x-icon-1
[Release/3.2.x]: https://github.com/hschottm/textwizard/releases/tag/Release/3.2.x
[legacy-contao-3.1-icon-1]: https://github.com/hschottm/textwizard/releases/tag/legacy-contao-3.1-icon-1
