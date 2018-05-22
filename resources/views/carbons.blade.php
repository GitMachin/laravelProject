<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
			<div class="top-right links">
				@auth
				<a href="{{ url('/home') }}">Home</a>
				@else
				<a href="{{ route('login') }}">Login</a>
				<a href="{{ route('register') }}">Register</a>
				@endauth
			</div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Carbons
                </div>
				
                <div class="links">
				<a href="https://carbon.nesbot.com/docs/">Docs</a>
					
				</div>

                <div class=" ">
					<h2>Carbon TEST</h2>

					<?php

					use Carbon\Carbon;

$string = 'first day of January 2018';

					$carbon = new Carbon($string, 'Europe/Paris');
					echo "<h3>Initialisation " . get_class($carbon) . "</h3>";	 // 'Carbon\Carbon'

					if (strtotime($string) === false) {
						echo "'$string' pas valide.";
					} elseif (Carbon::hasRelativeKeywords($string)) {
						echo "'$string' date valide relative; date/time string, peu changer.";
					} else {
						echo "'$string' date valide absolute date/time string, tjr la meme.";
					}
					echo "<br />";

					echo "2 semaines de plus : ";
					echo (new Carbon($string))->addWeeks(2);
					echo "<br />";

					echo "hier : ";
					$yesterday = Carbon::yesterday();
					echo $yesterday;	   // 2018-05-21 00:00:00
					echo "<br />";

					echo "<h3>Localisation</h3>";
					Carbon::setLocale('fr');
					echo $string . " en local  " . Carbon::getLocale() . " : ";
					echo $carbon->diffForHumans();
					echo "<br />";


					Carbon::setLocale('de');
					echo "Hier en local  " . Carbon::getLocale() . " : ";
					echo$yesterday->diffForHumans();
					echo "<br />";

					echo "<h3>Testing </h3>";
					$knownDate = Carbon::create(2001, 5, 21, 12);		  // create testing date
					echo "date test : " . $knownDate->format('Y-m-d') . "<br />";
					Carbon::setTestNow($knownDate);						// set the mock (of course this could be a real mock object)
					echo Carbon::getTestNow();							 // 2001-05-21 12:00:00

					echo "date now : " . Carbon::now() . "<br />";
					echo "test actif : ";
					var_dump(Carbon::hasTestNow());						// bool(true)
					echo "<br />";


					echo "date tomorrow : " . new Carbon('tomorrow') . "<br />";
					echo "date yesterday : " . new Carbon('yesterday') . "<br />";
					echo "date next wednesday : " . new Carbon('next wednesday') . "<br />";
					echo "date last friday : " . new Carbon('last friday') . "<br />";
					echo "date this thursday : " . new Carbon('this thursday') . "<br />";

					Carbon::setTestNow();								  // clear the mock

					echo "test actif : ";
					var_dump(Carbon::hasTestNow());						// bool(false)
					echo "<br />";


					echo "date now : " . Carbon::now() . "<br />";
					echo "date tomorrow : " . new Carbon('tomorrow') . "<br />";
					echo "date yesterday : " . new Carbon('yesterday') . "<br />";
					echo "date next wednesday : " . new Carbon('next wednesday') . "<br />";
					echo "date last friday : " . new Carbon('last friday') . "<br />";
					echo "date this thursday : " . new Carbon('this thursday') . "<br />";


					echo "<h3>Getters </h3>";
					$dt = $carbon->copy();

					var_dump($dt->year);
					echo "<br />";

					var_dump($dt->month);
					echo "<br />";

					var_dump($dt->day);
					echo "<br />";

					var_dump($dt->hour);
					echo "<br />";

					var_dump($dt->minute);
					echo "<br />";

					var_dump($dt->second);
					echo "<br />";

					var_dump($dt->micro);
					echo "<br />";

// dayOfWeek returns a number between 0 (sunday) and 6 (saturday)
					var_dump($dt->dayOfWeek);
					echo "<br />";

// dayOfWeekIso returns a number between 1 (monday) and 7 (sunday)
					var_dump($dt->dayOfWeekIso);
					echo "<br />";

					var_dump($dt->dayOfYear);
					echo "<br />";

					var_dump($dt->weekNumberInMonth);
					echo "<br />";

// weekNumberInMonth consider weeks from monday to sunday, so the week 1 will
// contain 1 day if the month start with a sunday, and up to 7 if it starts with a monday
					var_dump($dt->weekOfMonth);								  // int(1)
					echo "<br />";

// weekOfMonth will returns 1 for the 7 first days of the month, then 2 from the 8th to
// the 14th, 3 from the 15th to the 21st, 4 from 22nd to 28th and 5 above
					var_dump($dt->weekOfYear);
					echo "<br />";

					var_dump($dt->daysInMonth);
					echo "<br />";

					var_dump($dt->timestamp);
					echo "<br />";

					echo "age depuis 21/5/1975 : ";
					var_dump(Carbon::createFromDate(1975, 5, 21)->age);
					echo "<br />";

					var_dump($dt->quarter);
					echo "<br />";
					
					
					
					echo "<h3>Formatting</h3>";
					
					echo "afficher au format l jS \\of F Y h:i:s A : ";
echo $dt->format('l jS \\of F Y h:i:s A');         // Thursday 25th of December 1975 02:15:16 PM
					echo "<br />";

					echo "<h3>Comparison</h3>";
echo Carbon::now()->tzName;                        // America/Toronto
$first = Carbon::create(2012, 9, 5, 23, 26, 11);
$second = Carbon::create(2012, 9, 5, 20, 26, 11, 'America/Vancouver');

echo $first->toDateTimeString();                   // 2012-09-05 23:26:11
echo $first->tzName;                               // America/Toronto
echo $second->toDateTimeString();                  // 2012-09-05 20:26:11
echo $second->tzName;                              // America/Vancouver

var_dump($first->eq($second));                     // bool(true)
var_dump($first->ne($second));                     // bool(false)
var_dump($first->gt($second));                     // bool(false)
var_dump($first->gte($second));                    // bool(true)
var_dump($first->lt($second));                     // bool(false)
var_dump($first->lte($second));                    // bool(true)

$first->setDateTime(2012, 1, 1, 0, 0, 0);
$second->setDateTime(2012, 1, 1, 0, 0, 0);         // Remember tz is 'America/Vancouver'

var_dump($first->eq($second));                     // bool(false)
var_dump($first->ne($second));                     // bool(true)
var_dump($first->gt($second));                     // bool(false)
var_dump($first->gte($second));                    // bool(false)
var_dump($first->lt($second));                     // bool(true)
var_dump($first->lte($second));                    // bool(true)

// All have verbose aliases and PHP equivalent code:

var_dump($first->eq($second));                     // bool(false)
var_dump($first->equalTo($second));                // bool(false)
var_dump($first == $second);                       // bool(false)

var_dump($first->ne($second));                     // bool(true)
var_dump($first->notEqualTo($second));             // bool(true)
var_dump($first != $second);                       // bool(true)

var_dump($first->gt($second));                     // bool(false)
var_dump($first->greaterThan($second));            // bool(false)
var_dump($first > $second);                        // bool(false)

var_dump($first->gte($second));                    // bool(false)
var_dump($first->greaterThanOrEqualTo($second));   // bool(false)
var_dump($first >= $second);                       // bool(false)

var_dump($first->lt($second));                     // bool(true)
var_dump($first->lessThan($second));               // bool(true)
var_dump($first < $second);                        // bool(true)

var_dump($first->lte($second));                    // bool(true)
var_dump($first->lessThanOrEqualTo($second));      // bool(true)
var_dump($first <= $second);                       // bool(true)


					echo "<h3>Addition and Subtraction</h3>";
$dt = Carbon::create(2012, 1, 31, 0);

echo $dt->toDateTimeString();            // 2012-01-31 00:00:00

echo $dt->addCenturies(5);               // 2512-01-31 00:00:00
echo $dt->addCentury();                  // 2612-01-31 00:00:00
echo $dt->subCentury();                  // 2512-01-31 00:00:00
echo $dt->subCenturies(5);               // 2012-01-31 00:00:00

echo $dt->addYears(5);                   // 2017-01-31 00:00:00
echo $dt->addYear();                     // 2018-01-31 00:00:00
echo $dt->subYear();                     // 2017-01-31 00:00:00
echo $dt->subYears(5);                   // 2012-01-31 00:00:00

echo $dt->addQuarters(2);                // 2012-07-31 00:00:00
echo $dt->addQuarter();                  // 2012-10-31 00:00:00
echo $dt->subQuarter();                  // 2012-07-31 00:00:00
echo $dt->subQuarters(2);                // 2012-01-31 00:00:00

echo $dt->addMonths(60);                 // 2017-01-31 00:00:00
echo $dt->addMonth();                    // 2017-03-03 00:00:00 equivalent of $dt->month($dt->month + 1); so it wraps
echo $dt->subMonth();                    // 2017-02-03 00:00:00
echo $dt->subMonths(60);                 // 2012-02-03 00:00:00

echo $dt->addDays(29);                   // 2012-03-03 00:00:00
echo $dt->addDay();                      // 2012-03-04 00:00:00
echo $dt->subDay();                      // 2012-03-03 00:00:00
echo $dt->subDays(29);                   // 2012-02-03 00:00:00

echo $dt->addWeekdays(4);                // 2012-02-09 00:00:00
echo $dt->addWeekday();                  // 2012-02-10 00:00:00
echo $dt->subWeekday();                  // 2012-02-09 00:00:00
echo $dt->subWeekdays(4);                // 2012-02-03 00:00:00

echo $dt->addWeeks(3);                   // 2012-02-24 00:00:00
echo $dt->addWeek();                     // 2012-03-02 00:00:00
echo $dt->subWeek();                     // 2012-02-24 00:00:00
echo $dt->subWeeks(3);                   // 2012-02-03 00:00:00

echo $dt->addHours(24);                  // 2012-02-04 00:00:00
echo $dt->addHour();                     // 2012-02-04 01:00:00
echo $dt->subHour();                     // 2012-02-04 00:00:00
echo $dt->subHours(24);                  // 2012-02-03 00:00:00

echo $dt->addMinutes(61);                // 2012-02-03 01:01:00
echo $dt->addMinute();                   // 2012-02-03 01:02:00
echo $dt->subMinute();                   // 2012-02-03 01:01:00
echo $dt->subMinutes(61);                // 2012-02-03 00:00:00

echo $dt->addSeconds(61);                // 2012-02-03 00:01:01
echo $dt->addSecond();                   // 2012-02-03 00:01:02
echo $dt->subSecond();                   // 2012-02-03 00:01:01
echo $dt->subSeconds(61);                // 2012-02-03 00:00:00


					echo "<h3>Difference  </h3>";
echo Carbon::now('America/Vancouver')->diffInSeconds(Carbon::now('Europe/London')); // 0

$dtOttawa = Carbon::createMidnightDate(2000, 1, 1, 'America/Toronto');
$dtVancouver = Carbon::createMidnightDate(2000, 1, 1, 'America/Vancouver');
echo $dtOttawa->diffInHours($dtVancouver);                             // 3
echo $dtVancouver->diffInHours($dtOttawa);                             // 3

echo $dtOttawa->diffInHours($dtVancouver, false);                      // 3
echo $dtVancouver->diffInHours($dtOttawa, false);                      // -3

$dt = Carbon::createMidnightDate(2012, 1, 31);
echo $dt->diffInDays($dt->copy()->addMonth());                         // 31
echo $dt->diffInDays($dt->copy()->subMonth(), false);                  // -31

$dt = Carbon::createMidnightDate(2012, 4, 30);
echo $dt->diffInDays($dt->copy()->addMonth());                         // 30
echo $dt->diffInDays($dt->copy()->addWeek());                          // 7

$dt = Carbon::createMidnightDate(2012, 1, 1);
echo $dt->diffInMinutes($dt->copy()->addSeconds(59));                  // 0
echo $dt->diffInMinutes($dt->copy()->addSeconds(60));                  // 1
echo $dt->diffInMinutes($dt->copy()->addSeconds(119));                 // 1
echo $dt->diffInMinutes($dt->copy()->addSeconds(120));                 // 2

echo $dt->addSeconds(120)->secondsSinceMidnight();                     // 120
 

					echo "<h3>Difference for Humans</h3>";

// The most typical usage is for comments
// The instance is the date the comment was created and its being compared to default now()
echo Carbon::now()->subDays(5)->diffForHumans();               // 5 days ago

echo Carbon::now()->diffForHumans(Carbon::now()->subYear());   // 1 year after

$dt = Carbon::createFromDate(2011, 8, 1);

echo $dt->diffForHumans($dt->copy()->addMonth());                        // 1 month before
echo $dt->diffForHumans($dt->copy()->subMonth());                        // 1 month after

echo Carbon::now()->addSeconds(5)->diffForHumans();                      // 5 seconds from now

echo Carbon::now()->subDays(24)->diffForHumans();                        // 3 weeks ago
echo Carbon::now()->subDays(24)->diffForHumans(null, true);              // 3 weeks

echo Carbon::parse('2019-08-03')->diffForHumans('2019-08-13');           // 1 week before
echo Carbon::parse('2000-01-01 00:50:32')->diffForHumans('@946684800');  // 5 hours after

echo Carbon::create(2018, 2, 26, 4, 29, 43)->diffForHumans(Carbon::create(2016, 6, 21, 0, 0, 0), false, false, 6); // 1 year 8 months 5 days 4 hours 29 minutes 43 seconds after
					?>
                </div>
            </div>
        </div>
    </body>
</html>
