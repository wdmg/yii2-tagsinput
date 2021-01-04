<?php


namespace wdmg\widgets;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\web\AssetBundle;

class TagsInputAssets extends AssetBundle
{

    public $sourcePath = '@bower/bootstrap-tagsinput-plugin/src';

    public function init()
    {
        parent::init();
        $this->css = YII_DEBUG ? ['css/tagsinput.css'] : ['css/tagsinput.min.css'];
        $this->js = YII_DEBUG ? ['js/tagsinput.js'] : ['js/tagsinput.min.js'];
        $this->depends = [\yii\web\JqueryAsset::class];
    }

}