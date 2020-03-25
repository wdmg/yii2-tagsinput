[![Progress](https://img.shields.io/badge/required-Yii2_v2.0.33-blue.svg)](https://packagist.org/packages/yiisoft/yii2)
[![Github all releases](https://img.shields.io/github/downloads/wdmg/yii2-tagsinput/total.svg)](https://GitHub.com/wdmg/yii2-tagsinput/releases/)
[![GitHub version](https://badge.fury.io/gh/wdmg/yii2-tagsinput.svg)](https://github.com/wdmg/yii2-tagsinput)
![Progress](https://img.shields.io/badge/progress-in_development-red.svg)
[![GitHub license](https://img.shields.io/github/license/wdmg/yii2-tagsinput.svg)](https://github.com/wdmg/yii2-tagsinput/blob/master/LICENSE)

# Yii2 TagsInput
Tags input widget for Yii2

# Requirements 
* PHP 5.6 or higher
* Yii2 v.2.0.33 and newest
* Yii2 Bootstrap
* [Bootstrap TagsInput](https://github.com/wdmg/bootstrap-tagsinput) v.1.0.2 and newest.

# Installation
To install the widget, run the following command in the console:

`$ composer require "wdmg/yii2-tagsinput"`

# Usage
Example of standalone widget:

    <?php
    
    use wdmg\widgets\TagsInput;
    ...
    
    echo TagsInput::widget([
        'model' => $model,
        'attribute' => 'post_tags',
        'options' => [
            'class' => 'form-control'
        ],
        'pluginOptions' => [
            'minInput' => 2,
            'maxTags' => 100
        ]
    ])
    
    ?>

Example of use with ActiveForm:

    <?php
    
    use wdmg\widgets\TagsInput;
    ...
    
    $form = ActiveForm::begin();
    ...
    
    echo $form->field($model, 'post_tags')->widget(TagsInput::class, [
        'options' => [
            'class' => 'form-control'
        ],
        'pluginOptions' => [
            'autocomplete' => Yii::$app->request->absoluteUrl,
            'format' => 'json',
            'minInput' => 2,
            'maxTags' => 100
        ]
    ])->input('text', ['placeholder' => Yii::t('app/modules/newsletters', 'Type recipients...')]);
    ...
    
    ActiveForm::end();
    
    ?>


# Options

TagsInput extends InputWidget so you can use any options available for this widget. In addition, you can use these custom options if necessary:

| Name                   | Type    | Default                      | Description            |
|:---------------------- | ------- |:----------------------------- |:---------------------- |
| options                | array   | `['class' => 'form-control']` | Standard options for the input widget. |
| pluginOptions          | array   | array()                       | Plugin TagsInput options passed to js. Read more here (https://github.com/wdmg/bootstrap-tagsinput). |
| items                  | array   | `['value' => 'Label']`        | Array values with labels. |

            
# Status and version
* v.1.0.3 - Up to date dependencies
* v.1.0.2 - Fixed deprecated class declaration and added README.md