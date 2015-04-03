<?php
namespace CronTabAdapter\Model;

use CronTabAdapter\Scheduler\SchedulerInterface;

class CronJob implements SchedulerInterface
{
    private $minute = null;
    private $hour = null;
    private $dayOfMonth = null;
    private $month = null;
    private $dayOfWeek = null;
    private $command = null;

    /**
     * @return null
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param null $minute
     * @return $this
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;

        return $this;
    }

    /**
     * @return null
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param null $hour
     * @return $this
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * @return null
     */
    public function getDayOfMonth()
    {
        return $this->dayOfMonth;
    }

    /**
     * @param null $dayOfMonth
     * @return $this
     */
    public function setDayOfMonth($dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;

        return $this;
    }

    /**
     * @return null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param null $month
     * @return $this
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return null
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * @param null $dayOfWeek
     * @return $this
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    /**
     * @return null
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param null $command
     * @return $this
     */
    public function setCommand($command)
    {
        $this->command = $command;

        return $this;
    }
}