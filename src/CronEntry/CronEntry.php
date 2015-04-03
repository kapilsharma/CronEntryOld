<?php
/**
 * CronEntry.php
 * 
 * @author Kapil Sharma
 */

namespace CronEntry;

use CronTabAdapter\Collection\CronJobsCollection;

class CronEntry {
    private $cronJobsCollection;

    private $user;
    private $file;

    public function __construct($user, $file)
    {
        $this->user = $user;
        $this->file = $file;

        $this->cronJobsCollection = new CronJobsCollection();
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