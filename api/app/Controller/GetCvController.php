<?php

namespace CrazyMx\CvEngine\Controller;


use CrazyMx\CvEngine\CvRepository;
use Ramsey\Uuid\UuidInterface;

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
        return $this->cvRepository->get($uuid);
    }
}