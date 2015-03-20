<?php
$file = 'cronlog.txt';

$filename = $argv[0];

$date = date('Ymd - H:i:s');
$data = $date . ': Log written by ' . $filename . '.';

if (count($argv) > 1) {
    $argument = $argv[1];
    $data .= ' Args passed: ' . $argument;
}

$data .= "\n";

file_put_contents(dirname(__FILE__) . '/' . $file, $data, FILE_APPEND | LOCK_EX);
//echo '22data written to cron' . $data;
