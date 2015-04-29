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
 * Asset for the lodash library
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class LodashAsset extends AssetBundle 
{
    public $sourcePath = '@bower/lodash'; 

    public $js = [
        'lodash.js',
    ];
}