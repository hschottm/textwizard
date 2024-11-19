<?php

use Hschottm\TextWizardBundle\TextWizard;
use Contao\System;
use Contao\Request;

$GLOBALS['BE_FFL']['textwizard'] = TextWizard::class;

if (System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest(System::getContainer()->get('request_stack')->getCurrentRequest() ?? Request::create(''))) 
{
	$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/hschottmtextwizard/js/textwizard.js';
}
