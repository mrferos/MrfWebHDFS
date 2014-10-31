# MrfWebHDFS

## Installation

```bash
composer require mrferos/zf2-webhdfs:dev-master
```

## Description 

A simple ZF2 module providing an Abstract Factory to create instances of [php-WebHDFS](https://github.com/mrferos/php-WebHDFS)

## Usage

Copy the provided example config file into config/autoload
```bash
cp vendor/zf2-webhdfs/config/mrfwebhdfs.global.config.php.dist config/autoload/mrfwebhdfs.global.config.php
```

And edit the file with your settings:
```php
<?php
return array(
    'WebHDFSExample' => array(
        'username' => 'mrferos',
        'host' => 'localhost',
        'port' => 50070
    )
);
```

Calling "WebHDFSExample" from the service manager will return an instance of the WebHDFS class with your provided configurations.
```php
$webhdfs = $serviceManager->get('WebHDFSExample');
```

If you have multiple WebHDFS enpoints, you can define each like so:
```php
<?php
return array(
    'WebHDFSExample1' => array(
        'username' => 'mrferos',
        'host' => 'localhost',
        'port' => 50070
    ),
    'WebHDFSExample2' => array(
            'username' => 'mrferos',
            'host' => 'localhost',
            'port' => 50070
        )
    'WebHDFSExample3' => array(
            'username' => 'mrferos',
            'host' => 'localhost',
            'port' => 50070
        )
);
```

And call them in the same way,
```php
$webhdfs1 = $serviceManager->get('WebHDFSExample1');
$webhdfs2 = $serviceManager->get('WebHDFSExample2');
$webhdfs3 = $serviceManager->get('WebHDFSExample3');
```
