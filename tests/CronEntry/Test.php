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

$cronEntry = new CronEntry();
$cronEntry->getMinutes()->addAsset(new Asset(5, true));


print_r($cronEntry);

//Showing cron entry
$output = shell_exec('crontab -l');
echo 'output = ' . $output;