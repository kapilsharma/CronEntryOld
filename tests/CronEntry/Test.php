<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 19/3/15
 * Time: 6:44 PM
 */

use cronentry\asset\Asset;
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