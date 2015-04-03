<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 2/4/15
 * Time: 2:52 PM
 */

namespace CronTabAdapter;

//use CronTabAdapter\Scheduler\;

class CronAdapter {
    private $cronJobs;

    public function __construct(CronJobCollectionInterface $cronJobsCollection)
    {
        $this->cronJobs = $cronJobsCollection;
    }

    /**
     * Read a cron file and return CronModels
     *
     * @return CronModelCollection
     */
    public function readCronFile()
    {
        //TODO: Read existing cron file
    }
}