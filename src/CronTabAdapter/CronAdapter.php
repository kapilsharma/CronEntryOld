<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 2/4/15
 * Time: 2:52 PM
 */

namespace CronTabAdapter;

use CronTabAdapter\Scheduler\SchedulerCollectionInterface;
use CronTabAdapter\Scheduler\SchedulerInterface;

class CronAdapter {
    private $cronJobs;
    private $user;
    private $tempFile;

    public function __construct(SchedulerCollectionInterface $cronJobsCollection, $user, $tempFile)
    {
        $this->cronJobs = $cronJobsCollection;
        $this->user = $user;
        $this->tempFile = $tempFile;
    }

    public function setSsh()
    {

    }

    public function save()
    {
        $this->writeFile();
        $this->writeLocalCronTab();
    }

    public function writeLocalCronTab()
    {
        $output = shell_exec('crontab -u ' . $this->user . ' ' . $this->tempFile);
        echo 'output = ' . $output;
    }

    public function writeFile()
    {
        $cronArray = $this->cronJobs->getCronJobs();

        //Remove file if exist
        $this->deleteFile();

        /**
         * @var SchedulerInterface $cronJob
         */
        foreach ($cronArray as $cronJob) {
            $cronEntry = $this->getCronFormattedCommand($cronJob);
            file_put_contents($this->tempFile, $cronEntry, LOCK_EX | FILE_APPEND);
        }
    }

    public function getCronFormattedCommand(SchedulerInterface $cronJob)
    {
        $cronEntry = '';
        $cronEntry .= $cronJob->getMinute();
        $cronEntry .= ' ' . $cronJob->getHour();
        $cronEntry .= ' ' . $cronJob->getDayOfMonth();
        $cronEntry .= ' ' . $cronJob->getMonth();
        $cronEntry .= ' ' . $cronJob->getDayOfWeek();
        $cronEntry .= ' ' . $cronJob->getCommand() . PHP_EOL;

        return $cronEntry;
    }

    protected function deleteFile()
    {
        unlink($this->tempFile);
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