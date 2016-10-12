<?php

namespace CrazyMx\CvEngine\Controller;

use CrazyMx\CvEngine\CvRepository;
use CrazyMx\CvEngine\Model\CV;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
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

    public function __invoke(UuidInterface $uuid, CV $cv)
    {
        $this->cvRepository->store($cv);
        return new JsonResponse(['id' => (string) $uuid], Response::HTTP_CREATED);
    }
}