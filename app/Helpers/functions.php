<?php // no namespace set, loaded from composer.json autoload/files

use App\Helpers\LocalizationHelper;
use \Localize;

/**
 * Shortcut function to get alternate locale.
 *
 * @return string
 */
function altLocale ()
{
    return LocalizationHelper::getAlternateLocale();
}


/**
 * Get alternate locale name.
 *
 * @return string
 */
function altLocaleName ()
{
    return ucfirst(LocalizationHelper::getLocaleProperty( 'native', altLocale() ));
}


/**
 * Shortcut function to get alternate locale URL for the current page.
 *
 * @return  string
 */
function altLocaleURL ()
{
    return LocalizationHelper::getAlternateLocaleURL();
}


/**
 * @todo document this
 */
function locale ()
{
    return Localize::getCurrentLocale();
}