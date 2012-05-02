<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty localdate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     localdate<br>
 * Purpose:  returns a formated date based on a locale
 *
 * @author Mihai Zaharie (mihai@zaharie.ro)
 * @param string $
 * @param string $
 * @param string $
 * @param string $
 * @return string|void
 */
function smarty_modifier_localdate($string, $format = SMARTY_RESOURCE_DATE_FORMAT, $locale, $default_date = '')
{
    /**
    * Include the {@link shared.make_timestamp.php} plugin
    */
    require_once(SMARTY_PLUGINS_DIR . 'shared.make_timestamp.php');
    if ($string != '')
    {
        $timestamp = smarty_make_timestamp($string);
    } elseif ($default_date != '')
    {
        $timestamp = smarty_make_timestamp($default_date);
    } else {
        return;
    }

    if (DS == '\\')
    {
        $_win_from = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
        $_win_to = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');
        if (strpos($format, '%e') !== false) {
            $_win_from[] = '%e';
            $_win_to[] = sprintf('%\' 2d', date('j', $timestamp));
        }
        if (strpos($format, '%l') !== false) {
            $_win_from[] = '%l';
            $_win_to[] = sprintf('%\' 2d', date('h', $timestamp));
        }
        $format = str_replace($_win_from, $_win_to, $format);
    }

    switch ($locale)
    {
        case 'ro':
            $localeCodes = array(
                'ro_RO.ISO8859-2',
                'ro_RO.ISO-8859-2',
                'ro',                   // ISO 639-1
                'ro_RO',
                'ro-RO',
                'rom',
                'romanian',
                'ron',                  // ISO 639-2/T, ISO 639-3
                'rum'                   // ISO 639-2/B
            );
            break;
        case 'en':
            $localeCodes = array(
                'en-US',
                'en_US',
                'en',                   // ISO 639-1
                'eng'                   // ISO 639-2
            );
            break;
        default:
            $localeCodes = $locale;
    }
    setlocale(LC_ALL, $localeCodes);
    $formattedDate = strftime($format, $timestamp);
    setlocale(LC_ALL, null);

    return $formattedDate;
}

?>