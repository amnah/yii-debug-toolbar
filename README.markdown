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
![Image 1](/img/1.png)
![Image 2](/img/2.png)
![Image 3](/img/3.png)
![Image 4](/img/4.png)
![Image 5](/img/5.png)



