<?php
namespace developit\errorhandler;

use Yii;

class ErrorHandler extends \yii\web\ErrorHandler
{
    public $exceptionView = '@developit/errorhandler/views/exception.php';
}