<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty ids2string modifier plugin
 *
 * Type:     modifier<br>
 * Name:     ids2string<br>
 * Purpose:  return a string containing the names in the second array that
 *           corespond to the ids in the first
 *
 * @author Mihai Zaharie (mihai@zaharie.ro)
 * @param array
 * @param array
 * @param string
 * @return string
 */
function smarty_modifier_ids2string($ids, $names = array(), $glue = '')
{
    if (!is_array($ids))
    {
        $id = $ids;
        unset($ids);
        $ids[] = $id;
    }

    $output = '';
    foreach ($ids as $id)
    {
        if (array_key_exists($id, $names))
        {
            $output .= ($output != '') ? $glue . $names[$id] : $names[$id];
        }
        // Debugging
        // else
        // {
        //     $output .= ($output != '') ? $glue . 'N/A (' . $id . ')' : 'N/A (' . $id . ')';
        // }
    }
    return $output;
}
?>