<?php

declare(strict_types=1);

/*
 * @copyright  Helmut Schottmüller 2008-2018 <http://github.com/hschottm>
 * @author     Helmut Schottmüller (hschottm)
 * @package    contao-textwizard
 * @license    LGPL-3.0+, CC-BY-NC-3.0
 * @see	      https://github.com/hschottm/textwizard
 */

namespace Hschottm\TextWizardBundle;

use Hschottm\TextWizardBundle\DependencyInjection\TextWizardExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HschottmTextWizardBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new TextWizardExtension();
    }
}
