K Yii Debug Toolbar
=================

This fork is a modified template of the [yii-debug-toolbar](https://github.com/malyshev/yii-debug-toolbar). 

It is a minimalistic theme that takes up signficantly less screen space than the original.

See [images](#images) below for the differences. *Note that the information shown does differ slightly.*

## Installation

* Extract the archive into **protected/extensions/yii-debug-toolbar**
* Add configuration. Note that the class is called *KToolbarRoute*:

```php
<?php
//...
    'log'=>array(
        'class'=>'CLogRouter',
        'routes'=>array(
            array(
                'class'=>'ext.yii-debug-toolbar.KToolbarRoute',
                // Access is restricted by default to the localhost
                //'ipFilters'=>array('127.0.0.1','192.168.1.*', 88.23.23.0/24),
            ),
        ),
    ),
```

* Make sure your IP is listed in the `ipFilters` setting. If you are working locally this option not required.
* Enable [Profiling](http://www.yiiframework.com/doc/api/1.1/CDbConnection#enableProfiling-detail "") and [ParamLogging](http://www.yiiframework.com/doc/api/1.1/CDbConnection#enableParamLogging-detail "") for all used DB connections.

```php
<?php
//...
	'db'=>array(
	    'connectionString' => 'mysql:host=localhost;dbname=test',
	    //...
	    'enableProfiling'=>true,
	    'enableParamLogging'=>true,
	),
```

## Images
(/img/1.png)
(/img/1.png)
(/img/1.png)
(/img/1.png)
<img src="http://farm7.static.flickr.com/6177/6168425725_87de9089e7_z.jpg" alt="Screenshot1" />
<img src="http://farm8.staticflickr.com/7034/6417218835_21f8c4a558_z.jpg" alt="Screenshot2" />


