<?php
/**
 * CronDbService.php
 * 
 * @author Kapil Sharma
 */

namespace Service;


class CronDbService {

    public function

    /**
     * This is not original service but just a dummy service.
     * Original service is supposed to connect to the database and return all cron jobs
     *
     * {minute, hour, dayOfMonth, month, dayOfWeek, command}
     */
    public function getCronJobs()
    {
        return array(
            array(
                'minute' => '*',
                'hour' => '10-18',
                'dayOfMonth' => '*',
                'month' => '*',
                'dayOfWeek' => '*',
                'command' => '/usr/bin/php /home/kapilsharma/dev/kapil/CronEntry/tests/CronEntry/writelog.php CronEntryFromDB1'
            ),
            array(
                'minute' => '*/5',
                'hour' => '10-18',
                'dayOfMonth' => '*',
                'month' => '*',
                'dayOfWeek' => '*',
                'command' => '/usr/bin/php /home/kapilsharma/dev/kapil/CronEntry/tests/CronEntry/writelog.php CronEntryFromDB2-5Minutes'
            ),
        );
    }
}