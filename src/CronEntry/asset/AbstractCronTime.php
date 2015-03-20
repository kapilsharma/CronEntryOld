<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 19/3/15
 * Time: 6:23 PM
 */

namespace cronentry\asset;

abstract class AbstractCronTime {
    protected $assets;

    public function __construct(AssetCollection $assetCollection = null)
    {
        if ($assetCollection == null) {
            $this->assets = new AssetCollection();
        } else {
            $this->assets = $assetCollection;
        }
    }

    public function addAsset(Asset $asset)
    {
        $this->isValid();
        $this->assets->addAsset($asset);
    }

    public function makeNumberFromAssets()
    {
        $minutes = array();
        $assets = $this->assets->getAssets();
        foreach($assets as $asset) {
            $minutes[] = $asset->getInterval();
        }

        if(count($minutes) > 0) {
            $minute = implode(',', $minutes);
        } else {
            $minute = '*';
        }

        return $minute;
    }

    abstract function isValid();
}