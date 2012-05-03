<?php
/**
 * DeskCal
 *
 * Requires at least PHP 5.1.0
 *
 * LICENSE: CC BY-NC-SA 3.0
 * http://creativecommons.org/licenses/by-nc-sa/3.0/
 *
 * @author Mihai Zaharie <mihai@zaharie.ro>
 */

/**
 * Settings
 */

$appTimezone    = 'Europe/Bucharest';
$debug 			= false;

/**
 * Paths
 */

define('CONFIG_DIR', '');
define('LIBRARIES_DIR', 'libraries');
define('TEMPLATES_DIR', 'templates');
define('SMARTY_USER_PLUGINS_DIR', LIBRARIES_DIR . '/Smarty/userplugins');
define('TEMPLATES_COMPILED_DIR', 'cache/templates/compiled');
define('TEMPLATES_CACHED_DIR', 'cache/templates/cached');

/**
 * Bootstrapper
 */

// Set the localization

date_default_timezone_set($appTimezone);

// Load and setup Smarty

require_once(LIBRARIES_DIR . '/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir 	= TEMPLATES_DIR;
$smarty->compile_dir 	= TEMPLATES_COMPILED_DIR;
$smarty->config_dir 	= CONFIG_DIR;
$smarty->cache_dir 		= TEMPLATES_CACHED_DIR;
$smarty->debugging 		= $debug;
$smarty->caching 		= false;
$smarty->compile_check 	= $debug;

$smarty->addPluginsDir(SMARTY_USER_PLUGINS_DIR);

// User request

$requestMonth = (isset($_GET['month']) && preg_match('/^(0?[1-9]|1[012])$/i', $_GET['month'])) ? $_GET['month'] : date('n');
$requestYear = (isset($_GET['year'])) ? $_GET['year'] : date('Y');

// Prepare the calendar data

$timestamp = mktime(0, 0, 0, $requestMonth, 1, $requestYear);
$month['name'] = date('F', $timestamp) . ' ' . $requestYear;
$week = (int) date('W', $timestamp);

for ($w = 1; $w <= 6; $w++)
{
	$year = ($requestMonth == 1 && $week > 6) ? $requestYear - 1 : $requestYear;
	$lastWeekOfYear = (int) date('W', mktime(0, 0, 0, 12, 31, $year));
	if ($lastWeekOfYear >= 52 && $week > $lastWeekOfYear)
	{
		$week = 1;
		$year = $requestYear;
	}

	$month['weeks'][$week]['number'] = $week;

	for ($d = 1; $d <= 7; $d++)
	{
		$timestamp = strtotime($year . 'W' . str_pad($week, 2, '0', STR_PAD_LEFT) . $d);
		$day = date('d', $timestamp);
		$name = date('l', $timestamp);
		$monthCheck = date('n', $timestamp);

		$month['weeks'][$week]['days'][$day]['number'] = $day;
		$month['weeks'][$week]['days'][$day]['name'] = $name;
		$month['weeks'][$week]['days'][$day]['today'] = (mktime(0, 0, 0) == $timestamp) ? 'today' : '';
		$month['weeks'][$week]['days'][$day]['offMonth'] = (date('n') != $monthCheck) ? 'off-month' : '';

		$month['weeks'][$week]['days'][$day]['date'] = date('Y-m-d', $timestamp);
	}

	$week++;
}

// Display the calendar

$smarty->assign('month', $month);
$smarty->display('month.tpl');