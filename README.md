yii2 custom error handler
=========================
yii2 error handler With the ability to search on google and stackoverflow and display results in order to find a quick solution.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist developit/yii2-errorhandler "*"
```

or add

```
"developit/yii2-errorhandler": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \developit\errorhandler\AutoloadExample::widget(); ?>```