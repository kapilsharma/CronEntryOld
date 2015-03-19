<?php
/**
 * Created by PhpStorm.
 * User: kapilsharma
 * Date: 19/3/15
 * Time: 6:23 PM
 */

namespace cronentry\asset;

abstract class AbstractCronTime {
    private $asset;

    public function __construct(AssetCollection $assetCollection = null)
    {
        if ($assetCollection == null) {
            $this->asset = new AssetCollection();
        } else {
            $this->asset = $assetCollection;
        }
    }

    public function addAsset(Asset $asset)
    {
        $this->isValid();
        $this->asset->addAsset($asset);
    }

    abstract function isValid();
}