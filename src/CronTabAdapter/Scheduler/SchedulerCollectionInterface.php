<?php
/**
 * SchedulerCollectionInterface.php
 * 
 * @author Kapil Sharma
 */

namespace CronTabAdapter\Scheduler;

use CronTabAdapter\Scheduler\SchedulerInterface;

interface SchedulerCollectionInterface
{
    /**
     * @param SchedulerInterface $cron to be added in collection
     */
    public function addCronJob(SchedulerInterface $cron);

    /**
     * @return array of SchedulerInterface
     */
    public function getCronJobs();
}