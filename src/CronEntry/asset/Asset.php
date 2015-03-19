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


}