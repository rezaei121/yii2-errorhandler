<?php
namespace developit\errorhandler;

use yii\web\AssetBundle;
use Yii;

class ErrorHandlerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/developit/yii2-errorhandler/assets';
    public $css = ['css/style.css'];
    public $js = [
        'js/error-handler.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}