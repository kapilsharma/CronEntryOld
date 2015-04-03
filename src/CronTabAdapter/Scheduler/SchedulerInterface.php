<?php
/**
 * SchedulerInterface.php
 * 
 * @author Kapil Sharma
 */

namespace CronTabAdapter\Scheduler;


interface SchedulerInterface
{
    public function getMinute();
    public function setMinute($minute);
    public function getHour();
    public function setHour($hour);
    public function getDayOfMonth();
    public function setDayOfMonth($dayOfMonth);
    public function getMonth();
    public function setMonth($month);
    public function getDayOfWeek();
    public function setDayOfWeek($dayOfWeek);
    public function getCommand();
    public function setCommand($command);
}