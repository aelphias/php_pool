#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");
//echo date("F j, Y, g:i a", 1384254141)."\n";
//echo date("U", 1384254141)."\n";
if ($argc !== 2)
exit();
$date = explode(" ", $argv[1]);
if ((count($date)) !== 5)
{
    print("Wrong Format\n");
    exit();
}

$week = array(1 => "lundi", "mardi", "mercredi",
"jeudi", "vendredi", "samedi", "dimanche");
$month_name = array(1 => "janvier", "février", "mars",
"avril", "mai", "juin", "juillet", "août",
"septembre", "octobre", "novembre", "décembre");

if (!(array_search(lcfirst($date[2]), $month_name)))
{
    print("Wrong Format\n");
    exit();
}

if (!(array_search(lcfirst($date[0]), $week)))
{
    print("Wrong Format\n");
    exit();
}
$month = array_search(lcfirst($date[2]), $month_name);
$day = $date[1];
$year = $date[3];
checkdate($month,$day, $year);
if (!(checkdate($month,$day, $year))) {
    print("Wrong Format\n");
    exit();
}

$time = preg_replace("/:/",",",$date[4]);

//$date_obj = date_create_from_format('D,d,m,Y,H,i,s', 'Tuesday,12,11,2013,12,02,21');
$date_formatted = $day.",".$month.",".$year.",".$time;
$date_obj = date_create_from_format('d,m,Y,H,i,s', $date_formatted);

if (!$date_obj)
{
    print("Wrong Format\n");
    exit();
}




//print (date_timestamp_get($date_obj)."\n");
if (($timestamp = date_timestamp_get($date_obj))) 
print($timestamp."\n");
else
    print("Wrong Format\n");



//echo strtotime("10 September 2000"), "\n";
?>