<?php
namespace common\widgets\panel;

use yii\web\AssetBundle;


class PanelWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/panel/assets';
//    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
//        'panel-widget.css',
    ];
    public $js = [
        'js/jquery.panel-widget.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}