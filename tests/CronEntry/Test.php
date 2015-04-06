<?php

use CronEntry\CronEntry;
use Service\CronDbService;

require '../../vendor/autoload.php';

$cronEntry = new CronEntry('kapilsharma', '/home/kapilsharma/dev/kapil/CronEntry/tests/CronEntry/cronfile');

$cronEntry->readFromDatabase(new CronDbService());
$cronEntry->save();

// ToDo: Remove Old code below. Just kept for picking up some old code functions.
/*
 *
 *use cronentry\asset\Asset;
use cronentry\CronEntry;

require '../../vendor/autoload.php';

$cronEntry = new CronEntry('kapilsharma', '/home/kapilsharma/dev/kapil/CronEntry/tests/CronEntry/cronfile');

//for ($i = 0; $i <= 60; $i += 5) {
//    $cronEntry->getMinutes()->addAsset(new Asset($i, true));
//}

$cronEntry->getHours()->addAsset(new Asset(19, true));
$cronEntry->setCommand('/usr/bin/php /home/kapilsharma/dev/kapil/CronEntry/tests/CronEntry/writelog.php CronEntry2');

echo $cronEntry->getCronFormattedCommand() . PHP_EOL;
$cronEntry->writeCron();

//print_r($cronEntry);

//Showing cron entry
//$output = shell_exec('crontab -l');
//echo 'output = ' . $output;

*/