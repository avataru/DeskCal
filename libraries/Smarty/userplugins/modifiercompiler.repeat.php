<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifierCompiler
 */

/**
 * Smarty string repeat modifier plugin
 *
 * Type:     modifier<br>
 * Name:     repeat<br>
 * Purpose:  repeat the input string a number of times
 *
 * @author Mihai Zaharie (mihai@zaharie.ro)
 * @param array $params parameters
 * @return string with compiled code
 */
function smarty_modifiercompiler_repeat($params, $compiler)
{
    return 'str_repeat(' . $params[0] . ',' . $params[1] . ')';
}
?>