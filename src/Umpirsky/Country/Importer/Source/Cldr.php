<?php

/**
 * This file is part of the Country List project.
 *
 *  (c) Saša Stamenković <umpirsky@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Umpirsky\Country\Importer\Source;

use Umpirsky\Country\Importer\Importer;

/**
 * CLDR importer.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class Cldr extends Importer
{
    /**
     * Cldr constructor.
     */
    public function __construct()
    {
        \Zend_Locale::disableCache(true);
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguages()
    {
        return array_keys(\Zend_Locale::getLocaleList());
    }

    /**
     * {@inheritdoc}
     */
    public function getCountries($language)
    {
        $countries = \Zend_Locale::getTranslationList('territory', $language, 2);
        if (is_array($countries)) {
            asort($countries);
        }

        return $countries;
    }
}
