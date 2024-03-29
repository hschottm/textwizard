<?php

declare(strict_types=1);

/*
 * @copyright  Helmut Schottmüller 2008-2018 <http://github.com/hschottm>
 * @author     Helmut Schottmüller (hschottm)
 * @package    contao-textwizard
 * @license    LGPL-3.0+, CC-BY-NC-3.0
 * @see	      https://github.com/hschottm/textwizard
 */

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
    public function getBundles(ParserInterface $parser): array
    {
        return [
             BundleConfig::create(HschottmTextWizardBundle::class)
              ->setLoadAfter([ContaoCoreBundle::class])
              ->setReplace(['textwizard']),
         ];
    }
}
