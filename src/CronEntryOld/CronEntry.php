<?php
/**
 *
 *
 * User: Kapil Sharma
 * Date: 19/3/15
 * Time: 5:16 PM
 */

namespace cronentry;


use cronentry\asset\AssetCollection;
use cronentry\asset\DayOfMonth;
use cronentry\asset\DayOfWeek;
use cronentry\asset\Hour;
use cronentry\asset\Minute;
use cronentry\asset\Month;

class CronEntry {
    private $minute = null;
    private $hour = null;
    private $dayOfMonth = null;
    private $month = null;
    private $dayOfWeek = null;
    private $command = null;
    private $cronAdapter = null;

    private $user;
    private $file;

    public function __construct($user, $file)
    {
        $this->minute = new Minute();
        $this->hour = new Hour();
        $this->dayOfMonth = new DayOfMonth();
        $this->month = new Month();
        $this->dayOfWeek = new DayOfWeek();

        $this->user = $user;
        $this->file = $file;
    }

    public function writeCron()
    {
        $this->writeFile();
        $this->writeCrontab();
    }

    private function writeCrontab()
    {
        $output = shell_exec('crontab -u ' . $this->user . ' ' . $this->file);
    }

    private function writeFile()
    {
        file_put_contents($this->file, $this->getCronFormattedCommand(), LOCK_EX);
    }

    public function getCronFormattedCommand()
    {
        $cronEntry = "";
        $cronEntry .= $this->minute->makeNumberFromAssets();
        $cronEntry .= ' ' . $this->hour->makeNumberFromAssets();
        $cronEntry .= ' ' . $this->dayOfMonth->makeNumberFromAssets();
        $cronEntry .= ' ' . $this->month->makeNumberFromAssets();
        $cronEntry .= ' ' . $this->dayOfWeek->makeNumberFromAssets();
        $cronEntry .= ' ' . $this->command . "\n";

        return $cronEntry;
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function getMinutes()
    {
        return $this->minute;
    }

    public function setMinutes(AssetCollection $AssetCollection)
    {
        $minute = new Minute($AssetCollection);
        $this->minute = $minute;
    }

    public function getHours()
    {
        return $this->hour;
    }

    public function setHours(AssetCollection $assetCollection)
    {
        $hour = new Hour($assetCollection);
        $this->hour = $hour;
    }

    public function getDayOfMonth()
    {
        return $this->dayOfMonth;
    }

    public function setDayOfMonth(AssetCollection $assetCollection)
    {
        $dayOfMonth = new DayOfMonth($assetCollection);
        $this->dayOfMonth = $dayOfMonth;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function setMonth(AssetCollection $assetCollection)
    {
        $month = new Month($assetCollection);
        $this->month = $month;
    }

    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(AssetCollection $assetCollection)
    {
        $dayOfWeek = new DayOfWeek($assetCollection);
        $this->dayOfWeek = $dayOfWeek;
    }
}