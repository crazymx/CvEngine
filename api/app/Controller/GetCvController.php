<?php

namespace CrazyMx\CvEngine\Controller;


use CrazyMx\CvEngine\CvRepository;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetCvController
{
    /**
     * @var CvRepository
     */
    private $cvRepository;

    public function __construct(CvRepository $cvRepository)
    {
        $this->cvRepository = $cvRepository;
    }

    public function __invoke(UuidInterface $uuid)
    {
        return new JsonResponse($this->cvRepository->get($uuid));
    }
}