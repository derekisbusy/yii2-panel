<?php
namespace common\widgets\panel;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\JsExpression;

class PanelWidget extends Widget{
	public $pluginOptions=[];
	public $defaultPluginOptions=[];
    public $title;
    public $content;
    public $footer;
    public $type = 'info';
    public $widget=true;
    public $collapsable=true;
    public $collapse=false;
    
    
    const TYPE_INFO = 'info';
    const TYPE_DEFAULT = 'default';
    const TYPE_DANGER = 'danger';
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
	
	public function init(){
		parent::init();
        if($this->widget) {
            PanelWidgetAsset::register($this->view);
            $this->view->registerJs("jQuery('#".$this->getId()."').bootstrap_panel(".\yii\helpers\Json::encode(array_merge($this->defaultPluginOptions,$this->pluginOptions), JSON_UNESCAPED_SLASHES).");",
                    \yii\web\View::POS_READY);
        }
        $style=$this->collapse ? 'display:none' : '';
        echo Html::beginTag('div', ['class'=>'panel panel-'.$this->type.' panel-widget','id'=>$this->getId()]);
        echo Html::tag('div', $this->title, ['class'=>'panel-heading']);
        echo Html::beginTag('div', ['class'=>'panel-body','style'=>$style]);
    }
    
	public function run(){
		echo $this->content;
        echo Html::endTag('div');
        if($this->footer)
            echo Html::tag('div', $this->footer, ['class'=>'panel-footer']);
        echo Html::endTag('div');
	}
    
    public static function begin($config = array()) {
        parent::begin($config);
    }
    
    public static function end() {
        parent::end();
    }
}