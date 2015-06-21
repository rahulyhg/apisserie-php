<?php namespace App\Helpers;

use Localize;
use Request;
use Route;

/**
 * Helpers for localization.
 *
 */
class LocalizationHelper
{

    /**
     * Return the locale that's not the current one.
     *
     * @return string
     */
    public static function getAlternateLocale ()
    {
        return Localize::getCurrentLocale() === 'en' ? 'fr' : 'en';
    }


    /**
     * Return the current page's URL for the alternate locale.
     *
     * @return string
     */
    public static function getAlternateLocaleURL ()
    {
        return Localize::getLocalizedURL( self::getAlternateLocale() );
    }


    /**
     * Return a property of the provided locale.
     *
     * @return mixed
     */
    public static function getLocaleProperty ( $property, $locale = null )
    {
        if ( !$locale )
        {
            $locale = Localize::getCurrentLocale();
        }

        $prop = Localize::getSupportedLocales()[$locale][$property];

        if ( empty($prop) )
        {
            return null;
        }

        return $prop;
    }

}