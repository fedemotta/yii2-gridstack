<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-gridstack
 */
namespace fedemotta\gridstack;

use yii\base\InvalidCallException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Gridstack.js Yii2 widget
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 */
class Gridstack extends Widget
{
    /**
     * @var array the HTML attributes for the widget main container tag.
     */
    public $options = [];
    
    /**
     * @var string the main container tag
     */
    public $tag = 'div';
    
    /**
     * @var array the HTML attributes for the widget sub container tag.
     */
    public $subOptions = [];
    
    /**
     * @var string the sub container tag
     */
    public $subTag = 'ul';
    
    /**
     * @var array the options for the Gridstack widget.
     */
    public $clientOptions = [];
    
    /**
     * @var the gridstack widgets that are currently active
     */
    private $_widgets = [];
    
    /**
     * Generates a gridstack start tag.
     * @param array $options
     * @param array $subOptions
     * @param string $tag
     * @param string $subTag
     * @return string the concatenated generated tags.
     * @see endContainer()
     */
    public static function beginContainer($options=[],$subOptions=[], $tag='div',$subTag='ul')
    {
        return Html::beginTag($tag,$options).Html::beginTag($subTag,$subOptions);
    }
    /**
     * Generates a gridstack end tag.
     * @param string $tag
     * @param string $subTag
     * @return string the concatenated generated tags.
     * @see beginContainer()
     */
    public static function endContainer($tag='div',$subTag='ul')
    {
        return Html::endTag($subTag).Html::endTag($tag);
    
    }
    /**
     * Generates a gridstack widget begin tag.
     * This method will create a new gridstack widget and returns its opening tag.
     * You should call [[endWidget()]] afterwards.
     * @param array $options
     * @param string $tag
     * @return string the generated tag
     * @see endWidget()
     */
    public function beginWidget($options=[],$tag='li')
    {
        $widget = Html::beginTag($tag,$options);
        $this->_widgets[] = $widget;
        return $widget;
        
    }
    /**
     * Generates a gridstack widget end tag.
     * @param string $tag
     * @return string the generated tag
     * @see beginWidget()
     */
    public function endWidget($tag='li')
    {
        $widget = array_pop($this->_widgets);
        if (!is_null($widget)) {
            return Html::endTag($tag);
        } else {
            throw new InvalidCallException('Mismatching endWidget() call.');
        }
    }
    /**
     * Initializes the widget.
     * This method will register the bootstrap asset bundle. If you override this method,
     * make sure you call the parent implementation first.
     */
    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        echo self::beginContainer($this->options,$this->subOptions,$this->tag, $this->subTag);
    }
     /**
     * Runs the widget.
     * This registers the necessary javascript code and renders the gridstack close tag.
     * @throws InvalidCallException if `beginWidget()` and `endWidget()` calls are not matching
     */
    public function run()
    {
        if (!empty($this->_widgets)) {
            throw new InvalidCallException('Each beginWidget() should have a matching endWidget() call.');
        }
        $id = $this->options['id'];
        $view = $this->getView();
        $namespace =  ["namespace" => "#$id"];
        $options = !empty($this->clientOptions) ? Json::encode(array_merge($namespace,$this->clientOptions)) : Json::encode($namespace);
        GridstackAsset::register($view);
        $view->registerJs("jQuery('#$id $this->subTag').gridstack($options);");
        echo self::endContainer($this->tag,$this->subTag);
    }
}
