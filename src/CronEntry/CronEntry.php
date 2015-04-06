<?php
/**
 * CronEntry.php
 * 
 * @author Kapil Sharma
 */

namespace CronEntry;

use CronTabAdapter\Collection\CronJobsCollection;
use CronTabAdapter\Model\CronJob;
use CronTabAdapter\CronAdapter;

//ToDo: To be changed by original service
use Service\CronDbService;

class CronEntry {
    private $cronJobsCollection;
    private $dbService;

    private $user;
    private $file;

    public function __construct($user, $file)
    {
        $this->user = $user;
        $this->file = $file;

        $this->cronJobsCollection = new CronJobsCollection();
    }

    public function save()
    {
        if (!$this->cronJobsCollection->hasCronJobs()) {
            return false;
        }

        $cronAdapter = new CronAdapter($this->cronJobsCollection, $this->user, $this->file);
        $cronAdapter->save();
    }

    /**
     * Will read data from DB service and make object of cronJobAdapter.
     * Service must have method getCronJobs and must return an array of arrays existing cron jobs.
     * Internal array must have following keys:
     * {minute, hour, dayOfMonth, month, dayOfWeek, command}
     *
     * ToDo: We must define a interface or Service class in type hint.
     *
     * @param CronDbService $dbService
     */
    public function readFromDatabase(CronDbService $dbService)
    {
        $cronJobs = $dbService->getCronJobs();

        foreach ($cronJobs as $cronJobArray) {
            $cronJob = new CronJob();
            $cronJob->setMinute($cronJobArray['minute'])
                ->setHour($cronJobArray['hour'])
                ->setDayOfMonth($cronJobArray['dayOfMonth'])
                ->setMonth($cronJobArray['month'])
                ->setDayOfWeek($cronJobArray['dayOfWeek'])
                ->setCommand($cronJobArray['command']);

            $this->cronJobsCollection->addCronJob($cronJob);
        }
    }

    /**
     * Set cron jobs collection.
     *
     * By default, if there are existing cron jobs, new cron jobs collection will not be set and return false. However
     * if there are no existing cron jobs, passed $cronJobsCollection will be set and return true.
     * To forcefully discard old $cronJobsCollection and set new one, pass second optional parameter as 'true'.
     *
     * @param CronJobsCollection $cronJobsCollection
     * @param bool $force - Default false.  Forcefully set by deleting old collection and set new one.
     * @return bool Collection set or not?
     */
    public function setCronJobsCollection(CronJobsCollection $cronJobsCollection, $force = false)
    {
        if (!force && $this->cronJobsCollection->hasCronJobs()) {
            return false;
        }

        $this->cronJobsCollection = $cronJobsCollection;

        return true;
    }
}