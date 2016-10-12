<?php

namespace CrazyMx\CvEngine\ServiceProvider;

use CrazyMx\CvEngine\CvRepository;
use CrazyMx\CvEngine\MongoDbCvRepository;
use DI\ContainerBuilder;
use MongoDB\Client;
use Silex\Application;
use Silex\ServiceProviderInterface;

class CvEngineServiceProvider implements ServiceProviderInterface
{
    /**
     * @var ContainerBuilder
     */
    private $containerBuilder;

    public function __construct(ContainerBuilder $containercontainerBuilder)
    {
        $this->containerBuilder = $containercontainerBuilder;
    }

    public function register(Application $app)
    {
        $this->containerBuilder->addDefinitions([
            CvRepository::class => function(){
                return new MongoDbCvRepository((new Client('mongodb://mongodb:27017'))->cvengine->selectCollection('cv'));
            }
        ]);
    }

    public function boot(Application $app)
    {

    }
}