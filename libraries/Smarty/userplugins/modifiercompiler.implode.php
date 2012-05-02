<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifierCompiler
 */

/**
 * Smarty implode modifier plugin
 *
 * Type:     modifier<br>
 * Name:     implode<br>
 * Purpose:  turn an array into a string
 *
 * @author Mihai Zaharie (mihai@zaharie.ro)
 * @param array $params parameters
 * @return string with compiled code
 */
function smarty_modifiercompiler_implode($params, $compiler)
{
    $glue = (isset($params[1])) ? $params[1] . ', ' : '';
    $array = $params[0];
    return 'implode(' . $glue . $array . ')';
}
?>