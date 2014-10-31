<?php
namespace MrfWebHDFS;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => array(
                'webhdfs' => 'MrfWebHDFS\\AbstractFactory'
            )
        );
    }
}