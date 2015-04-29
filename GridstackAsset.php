<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-gridstack
 */
namespace fedemotta\gridstack;
use yii\web\AssetBundle;

/**
 * Asset for the Gridstack JQuery plugin
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class GridstackAsset extends AssetBundle 
{
    public $sourcePath = '@bower/gridstack'; 

    public $css = [
        'dist/gridstack.css',
    ];

    public $js = [
        'dist/gridstack.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
    ];
}