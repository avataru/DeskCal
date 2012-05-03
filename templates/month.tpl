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
            <nav>
                <a href="?year={$month.previous.year}&month={$month.previous.month}">&lt;</a>
                <a href="?">&bull;</a>
                <a href="?year={$month.next.year}&month={$month.next.month}">&gt;</a>
            </nav>
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
    <footer>
        Source on <a href="https://github.com/avataru/DeskCal">GitHub</a> (<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">CC BY-NC-SA 3.0</a>).
        Best viewed in Mozilla Firefox @1680&times;1050.
        Created by <a href="http://mihai.zaharie.ro">Mihai Zaharie</a>.
        Inspired by Sherif Saleh's <a href="http://mondedesign.net/fond-decran-mai-2012/">May calendar</a>.
        Calendar icon made by <a href="http://wilsoninc.deviantart.com/art/Green-and-blue-104029981">Juan G&oacute;mez</a>.
    </footer>
</body>
</html>