yii2 custom error handler
=========================
yii2 error handler With the ability to search on google, stackoverflow and yiiframework and display results in order to find a quick solution.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require developit/yii2-errorhandler
```

or add

```
"developit/yii2-errorhandler": "*"
```

to the require section of your `composer.json` file.


Usage
-----

create a action(eg. errorhandler)

```php
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'errorhandler' => [
                'class' => 'developit\errorhandler\ErrorHandlerAction',
            ]
        ];
    }
```

update errorHandler on config.php

```php
        'errorHandler' => [
            'class' => 'developit\errorhandler\ErrorHandler',
            'errorAction' => 'site/error',
        ],
```

License
-------
yii2-errorhandler is an open source project created by Ehsan Rezaei(http://www.developit.ir) that is licensed under GPL-3.0.