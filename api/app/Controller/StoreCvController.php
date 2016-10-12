<?php

namespace CrazyMx\CvEngine\Controller;

use CrazyMx\CvEngine\CvRepository;
use CrazyMx\CvEngine\Model\CV;
use Symfony\Component\HttpFoundation\Response;

class StoreCvController
{
    /**
     * @var CvRepository
     */
    private $cvRepository;

    public function __construct(CvRepository $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function __invoke(CV $cv)
    {
        $this->cvRepository->store($cv);
        return new Response('', Response::HTTP_CREATED);
    }
}