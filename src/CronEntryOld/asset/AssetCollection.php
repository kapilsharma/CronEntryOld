<?php
/**
 *
 * User: kapil sharma
 * Date: 19/3/15
 * Time: 5:43 PM
 */

namespace cronentry\asset;

use cronentry\exception\KeyInUseException;

class AssetCollection {
    private $asset;

    public function __construct()
    {
        $this->asset = array();
    }

    public function addAsset(Asset $asset)
    {
        $this->asset[] = $asset;
    }

    public function getAssets()
    {
        return $this->asset;
    }

    public function removeAllAssets()
    {
        $this->asset = array();
    }
}