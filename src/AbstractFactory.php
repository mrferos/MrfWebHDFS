<?php
namespace MrfWebHDFS;

use WebHDFS\WebHDFS;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;

use \RuntimeException;

class AbstractFactory implements AbstractFactoryInterface
{
    const SERVICE_PREFIX = 'WebHDFS';
    protected $_requiredKeys = array('user', 'port', 'host');

    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        return substr($requestedName, 0, strlen(self::SERVICE_PREFIX)) == self::SERVICE_PREFIX;
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // Make sure we have the configs we need..
        $config = $serviceLocator->get('Config');
        if (!array_key_exists($requestedName, $config)) {
            throw new RuntimeException('No configurations found for ' . $requestedName);
        }

        // Make sure they're all there...
        $webHdfsConfigs = $config[$requestedName];
        foreach ($this->_requiredKeys as $key) {
            if (!array_key_exists($key, $webHdfsConfigs)) {
                throw new RuntimeException('Missing key ' . $key . ' in configuration');
            }
        }

        // BIG DATA TIME!
        return new WebHDFS($webHdfsConfigs['host'], $webHdfsConfigs['port'], $webHdfsConfigs['user']);
    }
}