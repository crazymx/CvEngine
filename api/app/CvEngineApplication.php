<?php

namespace CrazyMx\CvEngine;

use CrazyMx\CvEngine\ControllerProvider\CvControllerProvider;
use CrazyMx\CvEngine\ServiceProvider\CvEngineServiceProvider;
use DI\Bridge\Silex\Application;
use DI\ContainerBuilder;

class CvEngineApplication extends Application
{
    public function __construct(ContainerBuilder $containerBuilder = null, array $values = [])
    {
        $containerBuilder = $containerBuilder ?: new ContainerBuilder();
        $this->register(new CvEngineServiceProvider($containerBuilder));
        parent::__construct($containerBuilder, $values);
        $this['exception_handler']->disable();
        $this->mount('/', new CvControllerProvider());
    }

}