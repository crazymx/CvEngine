<?php

namespace CrazyMx\CvEngine\ControllerProvider;


use CrazyMx\CvEngine\Controller\GetCvController;
use CrazyMx\CvEngine\Controller\StoreCvController;
use CrazyMx\CvEngine\Converter\CvConverter;
use CrazyMx\CvEngine\Converter\UuidConverter;
use CrazyMx\CvEngine\Converter\UuidGenerator;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

class CvControllerProvider implements ControllerProviderInterface
{
    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
         /** @var ControllerCollection $controllers */
         $controllers = $app['controllers_factory'];

         $controllers->get('/{uuid}', GetCvController::class)
         ->convert('uuid', UuidConverter::class );

         $controllers->post('/', StoreCvController::class)
         ->convert('cv', CvConverter::class);

        return $controllers;
    }
}