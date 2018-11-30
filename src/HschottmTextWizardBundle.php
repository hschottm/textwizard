<?php

declare(strict_types=1);

namespace Hschottm\TextWizardBundle;

use Hschottm\TextWizardBundle\DependencyInjection\TextWizardExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HschottmTextWizardBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new TextWizardExtension();
    }
}
