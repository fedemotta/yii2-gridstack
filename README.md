Gridstack.js widget for Yii2
===========================
This extension provides the [Gridstack.js](https://github.com/ducksboard/gridstack.js) integration for the Yii2 framework.

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
$gridstack = Gridstack::begin([
    'options'=>['class'=>'gridstack'],
    'clientOptions'=>[
        'widget_margins'=> [10, 10],
        'widget_base_dimensions'=> [140, 140],
        'autogrow_cols'=> false,
        'resize'=>['enabled'=>true]
    ]
]);?>

<?= $gridstack->beginWidget([
        'data-row'=>"1", 'data-col'=>"1", 'data-sizex'=>"5", 'data-sizey'=>"2",
    ]);
?>
    <header>Some text</header>
    The widget content
<?=$gridstack->endWidget();?>

<?=$gridstack->beginWidget([
        'data-row'=>"1", 'data-col'=>"1", 'data-sizex'=>"4", 'data-sizey'=>"1",
    ]);
?>
    <header>Some other text</header>
    The other widget content
<?=$gridstack->endWidget();?>

<?php 
Gridstack::end();
```

You can also use Gridstack.js in the JavaScript layer of your application. To achieve this, you need to include Gridstack as a dependency of your Asset file.

```php
public $depends = [
...
'fedemotta\gridstack\GridstackAsset',
...
];
```
