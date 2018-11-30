<?php

declare(strict_types=1);

namespace Hschottm\TextWizardBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Hschottm\TextWizardBundle\HschottmTextWizardBundle;

/**
 * Plugin for the Contao Manager.
 *
 * @author Helmut Schottmüller (hschottm)
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
             BundleConfig::create(HschottmTextWizardBundle::class)
              ->setLoadAfter([ContaoCoreBundle::class])
              ->setReplace(['textwizard']),
         ];
    }
}
