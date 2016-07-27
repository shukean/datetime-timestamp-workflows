<?php
error_reporting(0);
require "workflows.php";
$query = $argv[1];
$offset = 8;
date_default_timezone_set('Etc/GMT'.($offset > 0 ? '-' : '+' ).abs($offset));

$wf = new workflows();

$timestamp = strtotime($query);
$wf->set('timestamp', $timestamp, "yes", null, "default", "Timestamp", $timestamp, null, null, $timestamp, "icon.png");

echo $wf->toXml();
