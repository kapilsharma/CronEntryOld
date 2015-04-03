<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 2/4/15
 * Time: 4:47 PM
 */

namespace CronTabAdapter\Collection;

use CronTabAdapter\Scheduler\SchedulerInterface;
use CronTabAdapter\Scheduler\SchedulerCollectionInterface;

class CronJobsCollection implements SchedulerCollectionInterface
{
    private $cronJobs;

    public function __construct()
    {
        $this->cronJobs = array();
    }

    public function addCronJob(SchedulerInterface $cron)
    {
        $this->cronJobs[] = $cron;
    }

    public function getCronJobs()
    {
        return $this->cronJobs;
    }

    public function hasCronJobs()
    {
        if (count($this->cronJobs) > 0) {
            return true;
        }

        return false;
    }
}