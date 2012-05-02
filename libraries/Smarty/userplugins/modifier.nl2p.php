<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty nl2p modifier plugin
 *
 * Type:     modifier<br>
 * Name:     nl2p<br>
 * Purpose:  turns new line characters to paragraphs or breaks
 *
 * Options:  while breaks are allowed, single new lines are transformed into
 *           breaks (<br>) while double or more new lines will mark paragraphs,
 *           otherwise, any number of sequent new lines will simply mark
 *           paragraphs
 *
 *           while xml is allowed, the breaks will be xml compatible break tags
 *           (<br />) instead of html tags (<br>)
 *
 * @author Mihai Zaharie (mihai@zaharie.ro)
 * @param string $
 * @param string $
 * @param string $
 * @return string
 */

function smarty_modifier_nl2p($string, $lineBreaks = true, $xml = true)
{
    // Remove existing HTML formatting to avoid double-wrapping things
    $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);

    // It is conceivable that people might still want single line-breaks
    // without breaking into a new paragraph.
    if ($lineBreaks == true)
    {
        $output = '<p>' . preg_replace('/(\n{2,}|\r{2,}|(?:\r\n){2,})/i', "</p>\n<p>", trim($string)) . '</p>';
        $output = preg_replace('/(?<!>)(\n|\r|\r\n)(?!>)/i', '<br' . ($xml == true ? ' /' : '') . '>', $output);
        return str_replace('<br /><br />', '<br />', $output);
    }
    else
    {
        return '<p>' . preg_replace('/((?:\n|\r|\r\n)+)/i', "</p>\n<p>", trim($string)) . '</p>';
    }
}
?>