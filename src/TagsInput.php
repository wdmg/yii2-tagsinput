<?php

namespace wdmg\widgets;

/**
 * Yii2 TagsInput
 *
 * @category        Widgets
 * @version         1.0.4
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-tagsinput
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;
use yii\base\InvalidConfigException;

class TagsInput extends InputWidget
{

    public $items = [];

    public $options = [
        'class' => 'form-control'
    ];

    public $pluginOptions = [
        'delimiter' => ',',
        'inputClass' => '.tagsinput',
        'labelClass' => '.label .label-info',
        'autocomplete' => false,
        'minInput' => 2,
        'maxTags' => 10
    ];

    private $tagsinputId = null;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        // Get input id
        if (isset($this->options['id']))
            $this->tagsinputId = $this->options['id'];
        else
            $this->tagsinputId = $this->getId();

        $this->options['id'] = $this->tagsinputId;

        // Build tags input
        $input = Html::activeInput('text', $this->model, $this->attribute, $this->options);

        // Register assets
        $this->registerAssets();

        echo $input;
    }

    /**
     * Register required assets for the widgets
     */
    public function registerAssets()
    {
        $js = [];
        $view = $this->getView();

        // Register tagsinput assets to view
        TagsInputAssets::register($view);

        // Parse plugin options and insert inline
        $pluginOptions = !empty($this->pluginOptions) ? Json::encode($this->pluginOptions) : '';
        $js[] = "; jQuery('#" . $this->tagsinputId . "').tagsinput($pluginOptions);";
        $js[] = "; jQuery(document).on('pjax:success', function() {
            jQuery('#" . $this->tagsinputId . "').tagsinput($pluginOptions);
        });";

        // Register tagsinput component initial script
        $view->registerJs(implode("\n", $js));

    }

}
