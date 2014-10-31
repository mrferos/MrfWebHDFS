<?php
namespace MrfWebHDFS;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => 'MrfWebHDFS\\AbstractFactory'
        );
    }
}