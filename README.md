Gridstack.js widget for Yii2
===========================
This extension provides the [Gridstack.js](https://github.com/troolee/gridstack.js) integration for the Yii2 framework.

[![Latest Stable Version](https://poser.pugx.org/fedemotta/yii2-gridstack/v/stable)](https://packagist.org/packages/fedemotta/yii2-gridstack) [![Total Downloads](https://poser.pugx.org/fedemotta/yii2-gridstack/downloads)](https://packagist.org/packages/fedemotta/yii2-gridstack) [![Latest Unstable Version](https://poser.pugx.org/fedemotta/yii2-gridstack/v/unstable)](https://packagist.org/packages/fedemotta/yii2-gridstack) [![License](https://poser.pugx.org/fedemotta/yii2-gridstack/license)](https://packagist.org/packages/fedemotta/yii2-gridstack)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist fedemotta/yii2-gridstack "*"
```

or add

```
"fedemotta/yii2-gridstack": "*"
```

to the require section of your `composer.json` file.

Usage
-----
Use Gridstack.js as any other other Yii2 widget.

```php
use fedemotta\gridstack\Gridstack;
```

```php
<?php
$gridstack = Gridstack::begin([
    'options'=>['class'=>'grid-stack'],
    'clientOptions'=>[
        'cellHeight'=> 80,
        'verticalMargin'=> 10,
    ],
]);?>

<?=$gridstack->beginWidget(['class'=>'grid-stack-item','data-gs-width'=>"4",'data-gs-height'=>"2",'data-gs-x'=>"0",'data-gs-y'=>"0",]);?>
    <div class="grid-stack-item-content"></div>
<?=$gridstack->endWidget();?>

<?=$gridstack->beginWidget(['class'=>'grid-stack-item','data-gs-width'=>"4",'data-gs-height'=>"4",'data-gs-x'=>"4",'data-gs-y'=>"0",]);?>
    <div class="grid-stack-item-content"></div>
<?=$gridstack->endWidget();?>

<?php 
Gridstack::end();
?>
```

You can also use Gridstack.js in the JavaScript layer of your application. To achieve this, you need to include Gridstack as a dependency of your Asset file.

```php
public $depends = [
...
'fedemotta\gridstack\GridstackAsset',
...
];
```
