<?php
require "workflows.php";
$query = $argv[1];
$offset = 8;
date_default_timezone_set('Etc/GMT'.($offset > 0 ? '-' : '+' ).abs($offset));

$wf = new workflows();

if (preg_match('/^\d+$/', $query)){
    $datetime = date('Y-m-d H:i:s', $query);
    $wf->set('datetime', $datetime, "yes", null, "default", "DateTime", $datetime, null, null, $datetime, "icon.png");
    $date = date('Y-m-d', $query);
    $wf->set('date', $date, "yes", null, "default", "Date", $date, null, null, $date, "icon.png");
    $time = date('H:i:s', $query);
    $wf->set('time', $time, "yes", null, "default", "Time", $time, null, null, $time, "icon.png");
}else{
    $wf->set("error", null, "yes", null, "default", "Error", "unix timestamp must be a integer", "icon.png");
}

echo $wf->toXml();
