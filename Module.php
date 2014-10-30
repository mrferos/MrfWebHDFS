<?php

class Module
{
    public function getServiceConfig()
    {
        return array(
            'abstract_factories' => 'MrfWebHDFS\\AbstractFactory'
        );
    }
}