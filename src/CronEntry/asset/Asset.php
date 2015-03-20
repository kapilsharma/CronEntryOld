<?php
/**
 *
 * User: kapilsharma
 * Date: 19/3/15
 * Time: 5:23 PM
 */

namespace cronentry\asset;


class Asset {
    private $interval;
    private $fraction;

    public function __construct($interval, $fraction = false)
    {
        $this->interval = $interval;
        $this->fraction = $fraction;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return boolean
     */
    public function isFraction()
    {
        return $this->fraction;
    }

    /**
     * @param boolean $fraction
     */
    public function setFraction($fraction)
    {
        $this->fraction = $fraction;
    }

    /**
     * @param mixed $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;
    }


}