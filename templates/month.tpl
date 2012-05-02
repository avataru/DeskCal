<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>DeskCal</title>
	<link rel="stylesheet" href="stylesheets/main.css">

    <meta name="description" content="">
    <meta name="author" content="Mihai Zaharie <mihai@zaharie.ro>">
    <meta name="license" content="CC BY-NC-SA 3.0 http://creativecommons.org/licenses/by-nc-sa/3.0/">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="wrapper">
    	<div class="month">
            <h1>{$month.name}</h1>
{foreach $month.weeks as $week}
            <div class="week">
    {foreach $week.days as $day}
                <div class="day {$day.name|lower} {$day.offMonth} {$day.today}">
                    <div class="slice"></div>
                    <div class="name">{$day.name|truncate:2:'':true}</div>
                    <div class="number">{$day.number}</div>
                </div>
    {/foreach}
                <h2>Week <strong>{$week.number}</strong></h2>
            </div>
{/foreach}
        </div>
    </div>
</body>
</html>